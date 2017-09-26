<?php

use Illuminate\Database\Seeder;
use Corp\Portfolio;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::insert([
            [
                'title'        => 'Steep This!',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Steep This!',
                'alias'        => 'project1',
                'img'          => '{"mini":"0061-175x175.jpg","max":"0061-770x368.jpg","path":"0061.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:50:47'
            ],
            [
                'title'        => 'Kineda',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Customer',
                'alias'        => 'project2',
                'img'          => '{"mini":"009-175x175.jpg","max":"009-770x368.jpg","path":"009.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:51:47'
            ],
            [
                'title'        => 'Love',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Customer',
                'alias'        => 'project3',
                'img'          => '{"mini":"0011-175x175.jpg","max":"0043-770x368.jpg","path":"0043.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:51:47'
            ],
            [
                'title'        => 'Guanacos',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Steep This!',
                'alias'        => 'project4',
                'img'          => '{"mini":"0027-175x175.jpg","max":"0027-770x368.jpg","path":"0027.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:52:47'
            ],
            [
                'title'        => 'Miller Bob',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Customer',
                'alias'        => 'project5',
                'img'          => '{"mini":"0071-175x175.jpg","max":"0071-770x368.jpg","path":"0071.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:53:47'
            ],
            [
                'title'        => 'Nili Studios',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Customer',
                'alias'        => 'project6',
                'img'          => '{"mini":"0052-175x175.jpg","max":"0052-770x368.jpg","path":"0052.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:54:47'
            ],
            [
                'title'        => 'VItale Premium',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Steep This!',
                'alias'        => 'project7',
                'img'          => '{"mini":"0081-175x175.jpg","max":"0081-770x368.jpg","path":"0081.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:55:47'
            ],
            [
                'title'        => 'Digitpool Medien',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Customer',
                'alias'        => 'project8',
                'img'          => '{"mini":"0071-175x175.jpg","max":"0071.jpg","path":"0071-770x368.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:54:47'
            ],
            [
                'title'        => 'Octopus',
                'text'         => 'Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.\r\n\r\nDonec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est. Maecenas dignissim mauris id est semper suscipit. Suspendisse venenatis vestibulum quam, quis porttitor arcu vestibulum et.\r\n\r\nSed porttitor eros ut purus elementum a consectetur purus vulputate ',
                'customer'     => 'Customer',
                'alias'        => 'project9',
                'img'          => '{"mini":"0081-175x175.jpg","max":"0081.jpg","path":"0081-770x368.jpg"}',
                'filter_alias' => 'brand-identity',
                'created_at'   => '2017-09-26 16:57:47'
            ],
        ]);
    }
}
