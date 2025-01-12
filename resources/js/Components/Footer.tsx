import React from 'react'
import InstagramIcon from './Icon/InstagramInco'
import YoutubeIcon from './Icon/YoutubeIcon'
import TikTokIcon from './Icon/TiktokIcon'
import { Image } from '@nextui-org/react'
import { logoBox } from '@/Constants'

export const Footer: React.FC = () => {
    const aboutMenu = [
        // {
        //     title: 'Akademik',
        //     link: '#'
        // },
        {
            title: 'Kurikulum',
            link: '#'
        },
        {
            title: 'berita',
            link: route('berita')
        }
    ]
    return (
        <footer className="bg-gray-50 w-full mt-5">
            <div className="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 justify-around py-5 px-5">
                <div className="profile">
                    <span className="font-bold border-s-4 border-black px-3">
                        Perencanaan Wilayah Dan Kota{' '}
                        <span className="text-main-green">ITERA</span>
                    </span>
                    <div className="flex gap-5 py-6">
                        <Image
                            src={logoBox}
                            width={90}
                            height={90}
                            alt="logo"
                            // className='w-[90px] h-[90px]'
                        />

                        <div className="text-sm">
                            <span className="font-bold">Ikuti Kami</span>
                            <div className="flex gap-2 pt-2">
                                <a target="_blank" href="#" className="mr-2">
                                    <InstagramIcon
                                        size={2}
                                        className=" text-main-green text-xs"
                                    />
                                </a>
                                <a target="_blank" href="#" className="mr-2">
                                    <YoutubeIcon
                                        size={2}
                                        className=" text-main-green text-xs"
                                    />
                                </a>
                                <a target="_blank" href="#" className="mr-2">
                                    <TikTokIcon
                                        size={2}
                                        className=" text-main-green text-xs"
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="contact ">
                    <span className="font-bold border-s-4 border-black px-3">
                        Hubungi Kami{' '}
                    </span>
                    <div className="py-6">
                        <p className="align-top">
                            Jl. Tabak No.09, Madukoro, Kec. Kotabumi Utara,
                            Kabupaten Lampung Utara, Lampung 34511
                        </p>
                    </div>
                </div>
                <div className="help">
                    <span className="font-bold border-s-4 border-black px-3">
                        Tentang Kami
                    </span>

                    <div className="py-6">
                        {aboutMenu.map((item, index) => (
                            <a key={index} href="#" className="block">
                                {item.title}
                            </a>
                        ))}
                    </div>
                </div>
            </div>
            <p className="text-center py-3 bg-sky-900 text-gray-200">
                &copy; {new Date().getFullYear()} Perencanaan Wilayah Dan Kota
                ITERA. All rights reserved.
            </p>
        </footer>
    )
}
