<?php

namespace MyBlog\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\FlashMessenger;

class ShowMessages extends AbstractHelper
{

    public function __invoke()
    {
        $this->flashMessenger()->addMessage($message);
        $this->flashMessenger()->addErrorMessage($message);
        $this->flashMessenger()->getMessages();
        $this->flashMessenger()->getErrorMessages();
        
        
        $messenger = new FlashMessenger();
        $error_messages = $messenger->getErrorMessages();
        $messages = $messenger->getMessages();
        $result = '';
        
        if (count($error_messages)) {
            $result .= '<ul class="error">';
            foreach ($error_messages as $message) {
                $result .= '<li>' . $message . '</li>';
            }
            $result .= '</ul>';
        }
        if (count($messages)) {
            $result .= '<ul>';
            foreach ($messages as $message) {
                $result .= '<li>' . $message . '</li>';
            }
            $result .= '</ul>';
        }
        return $result;
    }

}
