<?php

use SmartShop\Controller;

/**
 * Manages thank-you page
 */
class ThankYouController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();
        $this->template = 'page/thankyou';
    }

    public function display()
    {
        $this->assignTplVars([

        ]);
        
        return parent::display();
    }

}