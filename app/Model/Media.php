<?php

App::uses('AppModel', 'Model');

/**
 * Media Model
 *
 */
class Media extends AppModel
{
    const MEDIA_DIR_PATH = 'media/';
    const MEDIA_PRASANG_FILES_PATH = 'files/';

    const TYPE_IMAGE = 1;
    const TYPE_PDF = 2;
    const TYPE_DOC = 3;
    const TYPE_AUDIO = 4;
    const TYPE_VIDEO = 5;

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'medias';
    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    // Set sql date format before save
    private $_dateFields = array(
        'created',
    );

    protected $_allowedFileTypes = array(
        'application/pdf', // pdf
        'video/msvideo', // avi
        'video/avi', // avi
        'video/x-msvideo', // avi
        'application/msword', // doc
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
        'image/gif', // gif
        'audio/mpeg', // .mp3
        'audio/mp3', // .mp3
        'video/mpeg', // .mpeg
        'image/png', // png
        'image/jpeg', // jpg
        'image/jpg', // jpg
        'image/svg+xml', // svg
        'video/mp4', // mp4
    );

    protected $_imageTypes = array(
        'image/gif', // gif
        'image/jpeg', // jpeg
        'image/jpg', // jpg
        'image/svg+xml', // svg
        'image/png', // png
    );

    protected $_videoTypes = array(
        'video/mpeg', // .mpeg
        'video/msvideo', // avi
        'video/avi', // avi
        'video/x-msvideo', // avi
        'video/mp4', // mp4
    );

    protected $_audioTypes = array(
        'audio/mpeg', // .mp3
        'audio/mp3', // .mp3
    );

    protected $_pdfTypes = array(
        'application/pdf', // pdf
    );

    protected $_docTypes = array(
        'application/msword', // doc
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
    );

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Prasang' => array(
            'className' => 'Prasang',
            'foreignKey' => 'prasang_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

    public function isValidType($type)
    {
        if (in_array($type, $this->_allowedFileTypes)) {
            return true;
        }

        return false;
    }

    public function saveUploadedFile($name, $options = array())
    {
        $options += array(
            'prasang_id' => null,
        );
        $file = $_FILES[$name];
        $nameSplitted = explode('.', $file['name']);
        $extension = end($nameSplitted);
        $uniqueName = uniqid('file') . time();
        $sourcePath = $file['tmp_name']; // Storing source path of the file in a variable
        $filename = $uniqueName . '.' . $extension;
        $targetPath = WWW_ROOT . "/files/" . $filename; // Target path where file is to be stored
        // Moving Uploaded file
        if(move_uploaded_file($sourcePath, $targetPath)) {
            $this->create();
            $data = array(
                'name' => $filename,
                'originalname' => $file['name'],
                'type' => $file['type'],
                'size' => $file['size'],
                'extension' => $extension,
            );
            if ($options['prasang_id']) {
                $data['prasang_id'] = $options['prasang_id'];
            };
            
            return $this->save($data);
        }

        return false;
    }

    /**
     * This function is used with Prasang
     *
     * @param array $files
     * @return array
     */
    public function getMultiUploadedFileData($files)
    {
        $filesDetail = array();
        $upload_handler = new UploadHandler(null, false);
        foreach ($files as $name) {
            if (is_numeric($name) || is_array($name)) {
                continue;
            }

            // Get ext
            $namearr = explode('.', $name);
            $extension = end($namearr);

            // Prepare unique name
            $uniqueName = md5(uniqid() . time());
            $filename = $uniqueName . '.' . $extension;

            $sourcePath = WWW_ROOT . 'files/' . $name;
            $targetPath = WWW_ROOT . "files/" . $filename;
            $sourceThumbPath = WWW_ROOT . 'files/thumbnail/' . $name;
            $targetThumbPath = WWW_ROOT . "files/thumbnail/" . $filename;

            // Moving Uploaded file
            if(rename($sourcePath, $targetPath)) {
                chmod($targetPath, 0777);
                // Thumb only exist for images
                if (file_exists($sourceThumbPath)) {
                    rename($sourceThumbPath, $targetThumbPath);
                    chmod($targetThumbPath, 0777);
                }
                $filesDetail[] = array(
                    'name' => $filename,
                    'originalname' => $name,
                    'type' => mime_content_type($targetPath),
                    'size' => $upload_handler->get_file_size($targetPath),
                    'extension' => $extension,
                );
            }
        }

        return $filesDetail;
    }

    public function getHttpUrl($id)
    {
        $options = array('conditions' => array('Media.' . $this->Media->primaryKey => $id));
        $media = $this->Media->find('first', $options);
        if ($media['prasang_id']) {
            return self::MEDIA_PRASANG_FILES_PATH . $media['name'];
        }
        return self::MEDIA_DIR_PATH . $media['name'];
    }

    public function afterFind($results, $primary = false)
    {
        foreach ($results as $idx => $result) {
            if (!$results[$idx]['Media']['name']) {
                // Note: after removing file from prasang in edit, it dont have data sometimes and
                // so notices, so don't do following in that case
                continue;
            }
            // Change date fields to readable
            foreach ($this->_dateFields as $field) {
                if (!empty($result['Media'][$field])) {
                    $results[$idx]['Media'][$field] = $this->toDateReadable(
                            $result['Media'][$field]
                    );
                }
            }

            // Set title image path
            $path = self::MEDIA_DIR_PATH;
            if ($results[$idx]['Media']['prasang_id']) {
                $path = self::MEDIA_PRASANG_FILES_PATH;
                $results[$idx]['Media']['iconUrl'] = '/' . $path . 'thumbnail/' . $result['Media']['name'];
            }
            $results[$idx]['Media']['fileUrl'] = '/' . $path . $result['Media']['name'];
            $results[$idx]['Media']['fullUrl'] = Router::url('/', true) .$path . $result['Media']['name'];
            switch ($this->getType($result['Media']['type'])) {
                case self::TYPE_VIDEO:
                    $results[$idx]['Media']['iconUrl'] = '/img/icon-video.png';
                    break;
                case self::TYPE_AUDIO:
                    $results[$idx]['Media']['iconUrl'] = '/img/icon-audio.png';
                    break;
                case self::TYPE_PDF:
                    $results[$idx]['Media']['iconUrl'] = '/img/icon-pdf.png';
                    break;
                case self::TYPE_DOC:
                    $results[$idx]['Media']['iconUrl'] = '/img/icon-doc.png';
                    break;
                case self::TYPE_IMAGE:
                default:
                    $results[$idx]['Media']['iconUrl'] = $results[$idx]['Media']['fullUrl'];                    
                    break;
            }
        }
        return $results;
    }

    public function getType($type)
    {
        if (in_array($type, $this->_videoTypes)) {
            return self::TYPE_VIDEO;
        }
        elseif (in_array($type, $this->_audioTypes)) {
            return self::TYPE_AUDIO;
        }
        elseif (in_array($type, $this->_pdfTypes)) {
            return self::TYPE_PDF;
        }
        elseif (in_array($type, $this->_imageTypes)) {
            return self::TYPE_IMAGE;
        }
        elseif (in_array($type, $this->_docTypes)) {
            return self::TYPE_DOC;
        }

        return '';
    }

    /**
     * Delete physical file too
     */
    public function afterDelete()
    {
//        $path = self::MEDIA_DIR_PATH;
//        if ($this->data['Media']['prasang_id']) {
//            $path = self::MEDIA_PRASANG_FILES_PATH;
//        }
//        $fileThumbPath = '/' . $path . 'thumbnail/' . $this->data['Media']['name'];
//        $filePath = '/' . $path . $this->data['Media']['name'];
//        if (file_exists($fileThumbPath)) {
//            unlink($fileThumbPath);
//        }
//        if ($filePath) {
//            unlink($filePath);
//        }
    }
    
    public function getPlaceholderOptions($medias)
    {
        $options = array();
        foreach ($medias as $media) {
            switch ($this->getType($media['type'])) {
                case self::TYPE_VIDEO:
                    $options[$media['originalname']] = sprintf('[Video%1$s]', $media['id']);
                    break;
                case self::TYPE_AUDIO:
                    $options[$media['originalname']] = sprintf('[Audio%1$s]', $media['id']);
                    break;
                case self::TYPE_PDF:
                    $options[$media['originalname']] = sprintf('<a href="%1$s" target="_blank">%2$s</a>', $media['fullUrl'], $media['originalname']);
                    break;
                case self::TYPE_DOC:
                    $options[$media['originalname']] = sprintf('<a href="%1$s" target="_blank">%2$s</a>', $media['fullUrl'], $media['originalname']);
                    break;
                case self::TYPE_IMAGE:
                    $options[$media['originalname']] = sprintf('<img src="%1$s">', $media['fullUrl']);
            }
        }
        
        return $options;
    }
}