import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { Card, CardBody, CardHeader, Button, Link } from '@heroui/react'

interface MbkmProps {
    mbkmPrograms: Array<{
        id: number
        title: string
        description: string
        benefits: string[] | string
        link: string
    }> | null
}

const Mbkm: React.FC<MbkmProps> = ({ mbkmPrograms }) => {
    return (
        <AppLayout title="MBKM">
            <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-8 min-h-[74vh] max-w-7xl">
                <div className="mb-8">
                    <h2 className="text-3xl font-bold text-main-blue-light mb-6">
                        Merdeka Belajar Kampus Merdeka (MBKM)
                    </h2>
                    <p className="text-lg text-gray-700 mb-6">
                        Program Merdeka Belajar Kampus Merdeka (MBKM) adalah
                        program yang memberikan kesempatan kepada mahasiswa
                        untuk belajar di luar program studinya selama 1 semester
                        atau setara dengan 20 SKS. Program ini bertujuan untuk
                        meningkatkan kompetensi lulusan, baik soft skills maupun
                        hard skills, agar lebih siap dan relevan dengan
                        kebutuhan zaman.
                    </p>
                </div>

                <div>
                    <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                        Program MBKM yang Tersedia
                    </h2>
                    {!mbkmPrograms ? (
                        <div className="text-center py-8">
                            <p className="text-gray-600 text-lg">
                                Data program MBKM sedang tidak tersedia.
                            </p>
                        </div>
                    ) : (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            {mbkmPrograms.map(program => (
                                <Card
                                    key={program.id}
                                    className="bg-white border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1"
                                >
                                    <CardHeader className="border-b border-gray-200 pb-4">
                                        <h3 className="text-xl font-bold text-main-blue-light">
                                            {program.title}
                                        </h3>
                                    </CardHeader>
                                    <CardBody className="p-6">
                                        <p className="text-gray-600 mb-6 line-clamp-3">
                                            {program.description}
                                        </p>
                                        <div className="space-y-3 mb-6">
                                            <h4 className="font-semibold text-main-blue-light text-lg">
                                                Manfaat Program:
                                            </h4>
                                            <ul className="space-y-2">
                                                {program.benefits ? (
                                                    Array.isArray(
                                                        program.benefits
                                                    ) ? (
                                                        program.benefits.map(
                                                            (benefit, idx) => (
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
                                                                            strokeWidth={
                                                                                2
                                                                            }
                                                                            d="M5 13l4 4L19 7"
                                                                        />
                                                                    </svg>
                                                                    <span className="text-gray-600">
                                                                        {
                                                                            benefit
                                                                        }
                                                                    </span>
                                                                </li>
                                                            )
                                                        )
                                                    ) : (
                                                        program.benefits
                                                            .split(', ')
                                                            .map(
                                                                (
                                                                    benefit,
                                                                    idx
                                                                ) => (
                                                                    <li
                                                                        key={
                                                                            idx
                                                                        }
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
                                                                                strokeWidth={
                                                                                    2
                                                                                }
                                                                                d="M5 13l4 4L19 7"
                                                                            />
                                                                        </svg>
                                                                        <span className="text-gray-600">
                                                                            {
                                                                                benefit
                                                                            }
                                                                        </span>
                                                                    </li>
                                                                )
                                                            )
                                                    )
                                                ) : (
                                                    <li className="text-gray-500 italic">
                                                        Tidak ada manfaat yang
                                                        tersedia
                                                    </li>
                                                )}
                                            </ul>
                                        </div>
                                        <Button
                                            as={Link}
                                            href={program.link}
                                            className="w-full bg-main-green hover:bg-main-green/90 text-white py-3 rounded-lg transition-all duration-300 flex items-center justify-center gap-2"
                                        >
                                            <svg
                                                className="w-5 h-5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    strokeLinecap="round"
                                                    strokeLinejoin="round"
                                                    strokeWidth={2}
                                                    d="M9 5l7 7-7 7"
                                                />
                                            </svg>
                                            Daftar Sekarang
                                        </Button>
                                    </CardBody>
                                </Card>
                            ))}
                        </div>
                    )}
                </div>
            </div>
        </AppLayout>
    )
}

export default Mbkm
