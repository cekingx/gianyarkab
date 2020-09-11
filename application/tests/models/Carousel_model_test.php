<?php

/**
 * @group model
 */
class Carousel_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();

        $CI->load->library('Seeder');
        $CI->seeder->call('CarouselSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('carousel_model');
        $this->obj = $this->CI->carousel_model;
    }

    public function test_WhenGetAllCarouselThenGetOneCarousel()
    {
        $output = $this->obj->getAll();
        $this->assertCount(1, $output);
    }

    public function test_WhenSetCarouselThenGetTwoCarousel()
    {
        $_POST = [
            'carousel_judul' => 'Nila',
            'carousel_caption' => 'Peresmian Kos'
        ];
        $output = $this->obj->save();

        $this->assertTrue($output);
        $this->assertCount(2, $this->obj->getAll());
    }

    public function test_WhenGetCarouselByIdThenGetTheSpecificCarousel()
    {
        $output = $this->obj->getById(2);

        $this->assertEquals('Nila', $output['carousel_judul']);
        $this->assertEquals('Peresmian Kos', $output['carousel_caption']);
    }

    public function test_WhenUpdateCarouselThenCarouselChanged()
    {
        $carousel_id = 2;
        $carousel = $this->obj->getById($carousel_id);
        $carousel['carousel_caption'] = 'Balik Kota';

        $_POST = [
            'carousel_id' => $carousel_id,
            'carousel_judul' => $carousel['carousel_judul'],
            'carousel_caption' => $carousel['carousel_caption'],
            'old_carousel_foto' => $carousel['carousel_foto']
        ];
        $status = $this->obj->update($carousel_id);
        $output = $this->obj->getById($carousel_id);

        $this->assertTrue($status);
        $this->assertEquals('Balik Kota', $output['carousel_caption']);
    }

    public function test_WhenDeleteCarouselThenGetOneCarousel()
    {
        $carousel_id = 2;
        $output = $this->obj->delete($carousel_id);

        $this->assertTrue($output);
        $this->assertCount(1, $this->obj->getAll());
    }
}