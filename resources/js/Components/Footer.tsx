import React from 'react'
import {
    FaMapMarkerAlt,
    FaInstagram,
    FaYoutube,
    FaTiktok
} from 'react-icons/fa'
import { Link, Image } from '@heroui/react'

interface FooterProps {
    tentang?: {
        name: string
        address: string
        phone: string
        email: string
        instagram_url: string
        youtube_url: string
        tiktok_url: string
    }
}

export function Footer({ tentang }: FooterProps) {
    const Logo_img = '/assets/img/logo.png'

    if (!tentang) {
        return (
            <footer className="bg-white py-12 mt-auto">
                <div className="container mx-auto px-4">
                    <div className="text-center">
                        <p className="text-main-blue/60">
                            Data sedang tidak tersedia. Silakan coba lagi nanti.
                        </p>
                    </div>
                </div>
            </footer>
        )
    }

    return (
        <footer className="bg-white py-12 mt-7 border-t border-main-blue/10">
            <div className="container mx-auto px-4">
                <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    {/* Left Column */}
                    <div className="lg:col-span-1">
                        <div className="mb-8">
                            <Link href="/" className="flex items-start gap-3">
                                <Image
                                    src={Logo_img}
                                    alt="Logo"
                                    className="w-14 h-14 object-contain"
                                />
                                <div className="flex flex-col mt-1">
                                    <h2 className="text-base font-bold text-main-blue leading-snug">
                                        Program Studi Perencanaan
                                    </h2>
                                    <h2 className="text-base font-bold text-main-blue leading-snug">
                                        Wilayah dan Kota
                                    </h2>
                                    <h3 className="text-sm font-semibold text-[#00923F]">
                                        ITERA
                                    </h3>
                                </div>
                            </Link>
                        </div>

                        <div className="mb-8">
                            <h3 className="text-xl font-bold text-main-blue mb-4">
                                Ikuti Kami
                            </h3>
                            <div className="flex gap-4">
                                <Link
                                    href={tentang.instagram_url}
                                    target="_blank"
                                    className="text-main-blue hover:text-main-green transition-colors"
                                >
                                    <FaInstagram size={24} />
                                </Link>
                                <Link
                                    href={tentang.youtube_url}
                                    target="_blank"
                                    className="text-main-blue hover:text-main-green transition-colors"
                                >
                                    <FaYoutube size={24} />
                                </Link>
                                <Link
                                    href={tentang.tiktok_url}
                                    target="_blank"
                                    className="text-main-blue hover:text-main-green transition-colors"
                                >
                                    <FaTiktok size={24} />
                                </Link>
                            </div>
                        </div>
                    </div>

                    {/* Middle Column */}
                    <div className="lg:col-span-1">
                        <h3 className="text-xl font-bold text-main-blue mb-4">
                            Hubungi Kami
                        </h3>
                        <div className="space-y-4">
                            <div className="flex items-start gap-3">
                                <FaMapMarkerAlt className="text-main-green text-xl mt-1" />
                                <p className="text-main-blue">
                                    {tentang.address}
                                </p>
                            </div>
                            <div className="flex items-start gap-3">
                                <p className="text-main-blue">
                                    {tentang.phone}
                                </p>
                            </div>
                            <div className="flex items-start gap-3">
                                <p className="text-main-blue">
                                    {tentang.email}
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Right Column */}
                    <div className="lg:col-span-1">
                        <h3 className="text-xl font-bold text-main-blue mb-4">
                            Tentang Kami
                        </h3>
                        <div className="space-y-2">
                            <Link
                                href="/kurikulum"
                                className="block text-main-blue hover:text-main-green transition-colors"
                            >
                                Kurikulum
                            </Link>
                            <Link
                                href="/berita"
                                className="block text-main-blue hover:text-main-green transition-colors"
                            >
                                Berita
                            </Link>
                        </div>
                    </div>
                </div>

                {/* Copyright */}
                <div className="mt-12 pt-8 border-t border-main-blue/10">
                    <p className="text-center text-main-blue/60">
                        © {new Date().getFullYear()} {tentang.name}. All rights
                        reserved.
                    </p>
                </div>
            </div>
        </footer>
    )
}
