<?php

use COREPOS\pos\lib\FormLib;

class Test extends PHPUnit_Framework_TestCase
{
    public function testPlugin()
    {
        $obj = new AnnualMeeting();
    }

    public function testParser()
    {
        $p = new AnnualMeetingParser();
        $this->assertEquals(false, $p->check('foo'));
        $this->assertEquals(true, $p->check('1041'));
        $this->assertEquals(true, $p->check('1041M'));
        $this->assertEquals(false, $p->check('1043'));

        $json = $p->parse('1041');
        $this->assertNotEquals(false, strstr($json['main_frame'], 'QMDisplay.php'));
        $json = $p->parse('1041M');
        $this->assertEquals(true, $json['redraw_footer']);
    }
}

