import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { FaBullseye, FaListCheck, FaEye } from 'react-icons/fa6'
import { useTranslation } from '@/Hooks/useTranslation'
import { useLanguage } from '@/Providers/LanguageProvider'

interface VisiMisiProps {
    visi: string | null
    misi: string[] | null
    tujuan: string[] | null
    message?: string
    title?: string
}

const VisiMisi: React.FC<VisiMisiProps> = ({
    visi,
    misi,
    tujuan,
    message,
    title
}) => {
    const { language } = useLanguage()

    // Pre-translate all static text
    const titleText = useTranslation(title || 'Visi & Misi')
    const visiText = useTranslation('Visi')
    const misiText = useTranslation('Misi')
    const tujuanText = useTranslation('Tujuan')
    const noDataText = useTranslation('Data visi misi belum tersedia')
    const visiContent = visi ? useTranslation(visi) : null
    
    if (!visi || !misi || !tujuan) {
        return (
            <AppLayout title={titleText}>
                <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                    <SectionTrigerScroll
                        id="visi-misi"
                        className="bg-white p-8 rounded-3xl shadow-xl"
                    >
                        <p className="text-lg text-gray-700">
                            {message ? useTranslation(message) : noDataText}
                        </p>
                    </SectionTrigerScroll>
                </div>
            </AppLayout>
        )
    }

    return (
        <AppLayout title={titleText}>
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <SectionTrigerScroll
                    id="visi"
                    className="bg-white p-8 rounded-3xl shadow-xl mb-8 hover:shadow-2xl transition-all duration-300"
                >
                    <div className="flex items-center gap-4 mb-6">
                        <div className="p-3 bg-main-blue/10 rounded-full">
                            <FaEye className="text-2xl text-main-blue-light" />
                        </div>
                        <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                            {visiText}
                            <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green rounded-full mt-2"></div>
                        </h2>
                    </div>
                    <p className="text-md sm:text-xl md:text-xl text-gray-700 pl-4 border-l-4 border-main-blue/30 text-justify">
                        {visiContent}
                    </p>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id="misi"
                    className="bg-white p-8 rounded-3xl shadow-xl mb-8 hover:shadow-2xl transition-all duration-300"
                >
                    <div className="flex items-center gap-4 mb-6">
                        <div className="p-3 bg-main-blue/10 rounded-full">
                            <FaListCheck className="text-2xl text-main-blue-light" />
                        </div>
                        <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                            {misiText}
                            <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green rounded-full mt-2"></div>
                        </h2>
                    </div>
                    <div className="space-y-4 pl-4">
                        {misi.map((item, index) => (
                            <div
                                key={index}
                                className="flex items-start gap-3 group"
                            >
                                <div className="flex-shrink-0 w-8 h-8 bg-main-blue/10 rounded-full flex items-center justify-center mt-1 group-hover:bg-main-blue/20 transition-colors duration-300">
                                    <span className="text-main-blue-light font-medium">
                                        {index + 1}
                                    </span>
                                </div>
                                <p className="text-md sm:text-xl md:text-xl text-gray-700 text-justify">
                                    {useTranslation(item)}
                                </p>
                            </div>
                        ))}
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id="tujuan"
                    className="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300"
                >
                    <div className="flex items-center gap-4 mb-6">
                        <div className="p-3 bg-main-blue/10 rounded-full">
                            <FaBullseye className="text-2xl text-main-blue-light" />
                        </div>
                        <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                            {tujuanText}
                            <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green rounded-full mt-2"></div>
                        </h2>
                    </div>
                    <div className="space-y-4 pl-4">
                        {tujuan.map((item, index) => (
                            <div
                                key={index}
                                className="flex items-start gap-3 group"
                            >
                                <div className="flex-shrink-0 w-8 h-8 bg-main-blue/10 rounded-full flex items-center justify-center mt-1 group-hover:bg-main-blue/20 transition-colors duration-300">
                                    <span className="text-main-blue-light font-medium">
                                        {index + 1}
                                    </span>
                                </div>
                                <p className="text-md sm:text-xl md:text-xl text-gray-700 text-justify">
                                    {useTranslation(item)}
                                </p>
                            </div>
                        ))}
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default VisiMisi
