import React, { useState } from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { Head } from '@inertiajs/react'
import {
    FaMapMarkerAlt,
    FaPhone,
    FaEnvelope,
} from 'react-icons/fa'
import { Button } from '@heroui/react'
import { useTranslation } from '@/Hooks/useTranslation'

interface ContactProps {
    title: string
    tentang: {
        name: string
        address: string
        phone: string
        email: string
        description: string
        instagram_url: string
        youtube_url: string
        tiktok_url: string
        latitude: string
        longitude: string
        maps_url: string
    }
}

interface FormData {
    name: string
    email: string
    subject: string
    message: string
}

export default function Contact({ title, tentang }: ContactProps) {
    const translate = useTranslation
    const [formData, setFormData] = useState<FormData>({
        name: '',
        email: '',
        subject: '',
        message: ''
    })

    if (!tentang) {
        return (
            <AppLayout title={title}>
                <Head title={translate('Kontak')} />
                <div className="min-h-screen bg-gray-100 py-12">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center">
                            <h1 className="text-3xl font-bold text-gray-900">
                                {translate('Contact Us')}
                            </h1>
                            <p className="mt-4 text-lg text-gray-600">
                                {translate(
                                    'Data sedang tidak tersedia. Silakan coba lagi nanti.'
                                )}
                            </p>
                        </div>
                    </div>
                </div>
            </AppLayout>
        )
    }

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault()

        const emailContent = `
Nama: ${formData.name}
Email: ${formData.email}
Pesan: ${formData.message}
        `.trim()

        const mailtoLink = `mailto:${tentang.email}?subject=${encodeURIComponent(formData.subject)}&body=${encodeURIComponent(emailContent)}`

        window.location.href = mailtoLink
    }

    const handleChange = (
        e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
    ) => {
        const { name, value } = e.target
        setFormData(prev => ({
            ...prev,
            [name]: value
        }))
    }

    const handleDirectEmail = () => {
        window.location.href = `mailto:${tentang.email}`
    }

    return (
        <AppLayout title={title} tentang={tentang}>
            <Head title={translate('Kontak')} />

            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl relative">
                {/* Title Section */}
                <div className="text-center mb-12">
                    <h1 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                        {translate('Hubungi Kami')}
                        <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green mx-auto rounded-full mt-2"></div>
                    </h1>
                </div>

                {/* Contact Info Cards */}
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div className="bg-white p-6 rounded-3xl shadow-xl">
                        <div className="flex items-center gap-3 mb-4">
                            <FaMapMarkerAlt className="text-main-green text-2xl" />
                            <h3 className="text-xl font-bold text-main-blue-light">
                                {translate('Alamat')}
                            </h3>
                        </div>
                        <p className="text-main-blue/70">{tentang.address}</p>
                    </div>
                    <div className="bg-white p-6 rounded-3xl shadow-xl">
                        <div className="flex items-center gap-3 mb-4">
                            <FaPhone className="text-main-green text-2xl" />
                            <h3 className="text-xl font-bold text-main-blue-light">
                                {translate('Telepon')}
                            </h3>
                        </div>
                        <p className="text-main-blue/70">{tentang.phone}</p>
                    </div>
                    <div
                        className="bg-white p-6 rounded-3xl shadow-xl cursor-pointer hover:bg-gray-50 transition-colors"
                        onClick={handleDirectEmail}
                    >
                        <div className="flex items-center gap-3 mb-4">
                            <FaEnvelope className="text-main-green text-2xl" />
                            <h3 className="text-xl font-bold text-main-blue-light">
                                {translate('Email')}
                            </h3>
                        </div>
                        <p className="text-main-blue/70">{tentang.email}</p>
                        <p className="text-sm text-main-green mt-2">
                            {translate('Klik untuk mengirim email langsung')}
                        </p>
                    </div>
                </div>

                {/* Google Maps Section */}
                <div className="mb-12">
                    <div className="bg-white p-6 rounded-3xl shadow-xl">
                        <h2 className="text-xl font-bold text-main-blue-light mb-6">
                            {translate('Lokasi Kami')}
                        </h2>
                        <div className="w-full h-[400px] rounded-xl overflow-hidden">
                            <iframe
                                src={`https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.3321641333584!2d${tentang.longitude}!3d${tentang.latitude}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c35b0573e907%3A0x25cfa2298b5b2bad!2sStudio%20PWK%20ITERA!5e0!3m2!1sen!2sid!4v1650432978654!5m2!1sen!2sid`}
                                width="100%"
                                height="100%"
                                style={{ border: 0 }}
                                allowFullScreen={true}
                                loading="lazy"
                                referrerPolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>

                {/* Contact Form Section */}
                <div className="mt-12">
                    <div className="bg-white p-6 rounded-3xl shadow-xl">
                        <h2 className="text-xl font-bold text-main-blue-light mb-6">
                            {translate('Kirim Pesan')}
                        </h2>
                        <form onSubmit={handleSubmit} className="space-y-4">
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input
                                    type="text"
                                    name="name"
                                    value={formData.name}
                                    onChange={handleChange}
                                    className="w-full px-4 py-2 rounded-xl border border-main-blue/20 focus:outline-none focus:ring-2 focus:ring-main-blue focus:border-transparent text-main-blue-light placeholder-main-blue/50"
                                    placeholder={translate('Nama')}
                                    required
                                />
                                <input
                                    type="email"
                                    name="email"
                                    value={formData.email}
                                    onChange={handleChange}
                                    className="w-full px-4 py-2 rounded-xl border border-main-blue/20 focus:outline-none focus:ring-2 focus:ring-main-blue focus:border-transparent text-main-blue-light placeholder-main-blue/50"
                                    placeholder={translate('Email')}
                                    required
                                />
                            </div>
                            <input
                                type="text"
                                name="subject"
                                value={formData.subject}
                                onChange={handleChange}
                                className="w-full px-4 py-2 rounded-xl border border-main-blue/20 focus:outline-none focus:ring-2 focus:ring-main-blue focus:border-transparent text-main-blue-light placeholder-main-blue/50"
                                placeholder={translate('Subjek')}
                                required
                            />
                            <textarea
                                name="message"
                                value={formData.message}
                                onChange={handleChange}
                                className="w-full px-4 py-2 rounded-xl border border-main-blue/20 focus:outline-none focus:ring-2 focus:ring-main-blue focus:border-transparent text-main-blue-light placeholder-main-blue/50"
                                rows={4}
                                placeholder={translate('Pesan')}
                                required
                            />
                            <Button
                                type="submit"
                                className="w-full bg-main-green text-white font-semibold py-2 rounded-xl hover:bg-opacity-90 transition-all"
                            >
                                {translate('Kirim Pesan')}
                            </Button>
                        </form>
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}
