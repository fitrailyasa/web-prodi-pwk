import React, { ReactNode } from 'react'
import { Head } from '@inertiajs/react'
import NavBar from '@/Components/NavBar'
import { Footer } from '@/Components/Footer'
import Chatbot from '@/Components/Chatbot'

interface AppLayoutProps {
    title: string
    children: ReactNode
}

const AppLayout: React.FC<AppLayoutProps> = ({ title, children }) => {
    return (
        <>
            <Head title={title} />
            <div className="min-h-screen bg-gray-100">
                <NavBar />
                <main>{children}</main>
                <Footer />
                <Chatbot />
            </div>
        </>
    )
}

export default AppLayout
