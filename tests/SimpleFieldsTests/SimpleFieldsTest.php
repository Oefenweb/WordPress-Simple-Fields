<?php
/**
 * MyPlugin Tests
 */
class MyPluginTest extends WP_UnitTestCase {

    public function setUp() {
        parent::setUp();
        global $sf;
        $this->sf = $sf;
    }

    public function testAppendContent() {
        #$this->assertEquals( "<p>Hello WordPress Unit Tests</p>", $this->my_plugin->append_content(''), '->append_content() appends text' );
    }

    // test defaults, should all be empty since we cleared the db...
    function testDefaults() {
	    $this->assertEquals(array(), $this->sf->get_post_connectors());
	    $this->assertEquals(array(), $this->sf->get_field_groups());
	    $this->assertEquals(array(), $this->sf->get_field_groups());
    }

    // Test output of debug function
    function test_debug() {
        $this->expectOutputString("<pre class='sf_box_debug'>this is simple fields debug function</pre>");
        sf_d("this is simple fields debug function");
    }
    
    // insert and test manually added fields
    function testManuallyAddedFields() {

	    _insert_manually_added_fields();
	    
	    $post_id = 11;
	    
	    $this->assertEquals("Text entered in the text field ", simple_fields_value("field_text", $post_id));
	    
    }
    
    

    /**
     * A contrived example using some WordPress functionality
     */
    public function testPostTitle() {
        
        // This will simulate running WordPress' main query.
        // See wordpress-tests/lib/testcase.php
        # $this->go_to('http://unit-test.simple-fields.com/wordpress/?p=1');

        // Now that the main query has run, we can do tests that are more functional in nature
        #global $wp_query;
        #sf_d($wp_query);
        #$post = $wp_query->get_queried_object();
        #var_dump($post);
        #$this->assertEquals('Hello world!', $post->post_title );
        #$this->assertEquals('Hello world!', $post->post_title );
    }
}

