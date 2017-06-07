<?php

/**
 * Toastr   http://codeseven.github.io/toastr/demo.html
 * Use Toastr 2.0.1 which publish at Nov 1,2013
 * @author Scott Huang(Zhiliang.Huang@gmail.com)
 * @package ext.yii-toastr.YiiToastr
 * @version 1.0
 * @Jan 2,2013
 */
class MugiToastr extends CWidget {

    public $options = array();
    public $responsive = false;
    public $message = '';
    public $title = '';
    public $type = 'info'; //add by Scott
    public $positionClass;
    public $flashMessagesOnly = false;
    public $flashDeleteAfterRead = True;

    public function init() {
        $this->registerClientScripts();
        parent::init();
    }

    public function run() {
//http://codeseven.github.io/toastr/demo.html
// limit to 4 types


        if (isset($this->options) && is_array($this->options)) {
            $toastrOptions = CJavaScript::encode($this->options);
        } else {
            $toastrOptions = CJavaScript::encode($this->defaultOptions());
        }

        if ($this->message && !$this->flashMessagesOnly) {
            if ($this->type != 'info' and $this->type != 'success' and $this->type != 'error' and $this->type != 'warning') {
                $this->type = 'info';  //modify by Scott Huang @ Dec 26,2013
            }
            $toastrScript = '';
            $toastrScript .='toastr.options=' . $toastrOptions . ';';
            $toastrScript .= 'toastr.' . $this->type . "('" . $this->message . "', '" . $this->title . "');";  //modify by Scott Huang @ Dec 26,2013		
            Yii::app()->clientScript->registerScript('toastr_msg_' . $this->type . rand(1, 99999), $toastrScript);
        } else {
            $flashes = Yii::app()->user->getFlashes($this->flashDeleteAfterRead);

            foreach ($flashes as $title => $message) {
                $this->title = $title;
                $this->message = $message;

                if (stristr($this->title, 'info'))
                    $this->type = 'info';
                elseif (stristr($this->title, 'success'))
                    $this->type = 'success';
                elseif (stristr($this->title, 'warning'))
                    $this->type = 'warning';
                elseif (stristr($this->title, 'error'))
                    $this->type = 'error';
                else
                    $this->type = 'info';
                
                $toastrScript = '';
                $toastrScript .='toastr.options=' . $toastrOptions . ';';
                $toastrScript .= 'toastr.' . $this->type . "('" . $this->message . "', '" . $this->title . "');";  //modify by Scott Huang @ Dec 26,2013		
                Yii::app()->clientScript->registerScript('toastr_' . $this->type . rand(1, 99999), $toastrScript);
//echo $toastrScript."<BR>";
            }
        }
    }

    public function registerClientScripts() {
        $cs = Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $assetsPath = dirname(__FILE__) . '/assets';
        $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
        $cs->registerCssFile($assetsUrl . '/toastr.css');
        if ($this->responsive)
            $cs->registerCssFile($assetsUrl . '/toastr-responsive.css', CClientScript::POS_HEAD);

        $cs->registerScriptFile($assetsUrl . '/toastr.js', CClientScript::POS_HEAD);
    }

    public
            function defaultOptions() {
        return array(
                // you can change by yourself for default options
        );
    }

}
