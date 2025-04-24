import React, { ReactNode } from 'react'
import { Head, usePage } from '@inertiajs/react'
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

type TentangData = {
    name: string
    address: string
    phone: string
    email: string
    instagram_url: string
    youtube_url: string
    tiktok_url: string
}

interface PageProps {
    tentang: TentangData
    [key: string]: any
}

export default function AppLayout({
    title,
    children,
    tentang
}: AppLayoutProps) {
    const { tentang: sharedTentang } = usePage<PageProps>().props

    return (
        <div className="min-h-screen flex flex-col">
            <Head title={title} />
            <NavBar />
            <main className="flex-grow">{children}</main>
            <Footer tentang={tentang || sharedTentang} />
            <Chatbot />
        </div>
    )
}
