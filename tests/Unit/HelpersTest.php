<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illumintate\Foundation\Testing\DatabaseMigrations;
use Illumintate\Foundation\Testing\DatabaseTransactions;

class HelpersTest extends TestCase
{
     /**
     * A basic test example.
     *
     * @return void
     */
    public function test_page_title_should_return_the_correct_title_if_provided()
    {
        $this->assertEquals('About | IbraForum- list of artisans',page_title('About'));
        $this->assertEquals('Home | IbraForum- list of artisans',page_title('Home'));
    }
    public function test_page_title_should_return_the_base_title_if_empty()
    {
        $this->assertEquals('IbraForum- list of artisans',page_title(''));
    }
    public function test_menu_item_should_return_active_if_clicked_on()
    {
    	$this->get(route('root_path'));
        $this->assertEquals('active',set_active_route('root_path'));
        $this->assertEquals('',set_active_route('about_path'));
    }
}
