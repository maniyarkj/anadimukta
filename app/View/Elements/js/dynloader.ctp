<?php
foreach ($dynData as $name => $elementId) {
    $data[$name] = sprintf("jQuery('#%s').val()", $elementId);
}
$arr = array();
foreach ($data as $key => $value) {
    $arr[] = sprintf("%s:%s", $key, $value);
}

if (!isset($onLoaded)) {
    // Dont remove this space
    $onLoaded = ' ';
}
$imageTag = '<img src="/img/loading.gif" class="loader" />';
$beforeSend = '$("#' . $update . '").parent("div").append(\'' . $imageTag . '\');';
$onLoaded .= ' $("#' . $update . '").next(".loader").remove();';

$this->Js->get('#'.$updateOnChange)->event(
        'change',
        $this->Js->request(
            $urlParams,
            array(
                'update'=>'#'.$update,
                'async' => true,
                'method' => 'post',
                'dataExpression'=>true,
                'data' => '{' . implode(',', $arr) . '}',
                'complete' => $onLoaded,
                'beforeSend' => $beforeSend,
            ))
);
if ($triggerOnInit) {
    $script = <<<EOF
$(document).ready(function() {
    $('#{$updateOnChange}').trigger('change');
});
EOF;
    $this->Js->buffer($script);
}
