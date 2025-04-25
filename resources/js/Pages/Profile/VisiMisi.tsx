import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { FaBullseye, FaListCheck, FaEye } from 'react-icons/fa6'

interface VisiMisiProps {
    visi: string | null
    misi: string[] | null
    tujuan: string[] | null
    message?: string
}

const VisiMisi: React.FC<VisiMisiProps> = ({ visi, misi, tujuan, message }) => {
    if (!visi || !misi || !tujuan) {
        return (
            <AppLayout title="Visi & Misi">
                <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                    <SectionTrigerScroll
                        id="visi-misi"
                        className="bg-white p-8 rounded-3xl shadow-xl"
                    >
                        <p className="text-lg text-gray-700">{message}</p>
                    </SectionTrigerScroll>
                </div>
            </AppLayout>
        )
    }

    return (
        <AppLayout title="Visi & Misi">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <SectionTrigerScroll
                    id="visi"
                    className="bg-white p-8 rounded-3xl shadow-xl mb-8 hover:shadow-2xl transition-all duration-300"
                >
                    <div className="flex items-center gap-4 mb-6">
                        <div className="p-3 bg-main-blue/10 rounded-full">
                            <FaEye className="text-2xl text-main-blue-light" />
                        </div>
                        <h2 className="text-3xl font-bold text-main-blue-light">
                            Visi
                        </h2>
                    </div>
                    <p className="text-lg text-gray-700 pl-4 border-l-4 border-main-blue/30">
                        {visi}
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
                        <h2 className="text-3xl font-bold text-main-blue-light">
                            Misi
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
                                <p className="text-lg text-gray-700 group-hover:text-main-blue/80 transition-colors duration-300">
                                    {item}
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
                        <h2 className="text-3xl font-bold text-main-blue-light">
                            Tujuan
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
                                <p className="text-lg text-gray-700 group-hover:text-main-blue/80 transition-colors duration-300">
                                    {item}
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
