import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Card, CardBody, CardHeader } from '@heroui/react'
import { useTranslation } from '@/Hooks/useTranslation'

interface KelompokKeahlianProps {
    kelompokKeahlian: Array<{
        id: number
        name: string
        description: string
        bidang: string[]
    }>
    title?: string
}

const KelompokKeahlian: React.FC<KelompokKeahlianProps> = ({
    kelompokKeahlian,
    title
}) => {
    // Pre-translate all static text
    const titleText = useTranslation(title || 'Kelompok Keahlian')
    const subtitleText = useTranslation(
        'Kelompok Keahlian Program Studi PWK ITERA'
    )
    const bidangKeahlianText = useTranslation('Bidang Keahlian:')

    return (
        <AppLayout title={titleText}>
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <div className="text-center mb-8">
                    <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                        {subtitleText}
                    </h2>
                    <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green mx-auto rounded-full"></div>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {kelompokKeahlian.map(kelompok => (
                        <Card
                            key={kelompok.id}
                            className="bg-white border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1"
                        >
                            <CardHeader className="border-b border-gray-200 pb-4">
                                <h3 className="text-xl font-bold text-main-blue-light">
                                    {useTranslation(kelompok.name)}
                                </h3>
                            </CardHeader>
                            <CardBody className="p-6">
                                <p className="text-gray-600 mb-6 line-clamp-3">
                                    {useTranslation(kelompok.description)}
                                </p>
                                <div className="space-y-3">
                                    <h4 className="font-semibold text-main-blue-light text-lg">
                                        {bidangKeahlianText}
                                    </h4>
                                    <ul className="space-y-2">
                                        {kelompok.bidang.map((bidang, idx) => (
                                            <li
                                                key={idx}
                                                className="flex items-start"
                                            >
                                                <svg
                                                    className="w-5 h-5 text-main-green mt-1 mr-2 flex-shrink-0"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        strokeLinecap="round"
                                                        strokeLinejoin="round"
                                                        strokeWidth={2}
                                                        d="M5 13l4 4L19 7"
                                                    />
                                                </svg>
                                                <span className="text-gray-700">
                                                    {useTranslation(bidang)}
                                                </span>
                                            </li>
                                        ))}
                                    </ul>
                                </div>
                            </CardBody>
                        </Card>
                    ))}
                </div>
            </div>
        </AppLayout>
    )
}

export default KelompokKeahlian
