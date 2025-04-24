import React, { ReactNode } from 'react'
import { Head } from '@inertiajs/react'
import NavBar from '@/Components/NavBar'
import { Footer } from '@/Components/Footer'
import Chatbot from '@/Components/Chatbot'

interface AppLayoutProps {
    title: string
    children: ReactNode
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

const defaultTentang = {
    name: 'Program Studi Perencanaan Wilayah dan Kota',
    address:
        'Jalan Terusan Ryacudu, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365',
    phone: '(0721) 8030188',
    email: 'pwk@itera.ac.id',
    instagram_url: 'https://instagram.com/pwkitera',
    youtube_url: 'https://youtube.com/@pwkitera',
    tiktok_url: 'https://tiktok.com/@pwkitera'
}

export default function AppLayout({
    title,
    children,
    tentang = defaultTentang
}: AppLayoutProps) {
    return (
        <div className="min-h-screen flex flex-col">
            <Head title={title} />
            <NavBar />
            <main className="flex-grow">{children}</main>
            <Footer tentang={tentang} />
            <Chatbot />
        </div>
    )
}
