import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Card, CardBody, CardHeader, Button, Link } from '@heroui/react'

const Mbkm: React.FC = () => {
    const mbkmPrograms = [
        {
            title: 'Pertukaran Pelajar',
            description: 'Program pertukaran pelajar memungkinkan mahasiswa untuk belajar di perguruan tinggi lain di dalam atau luar negeri selama satu semester atau satu tahun.',
            benefits: [
                'Meningkatkan wawasan dan pengalaman belajar',
                'Mengembangkan jaringan internasional',
                'Meningkatkan kemampuan bahasa asing'
            ],
            link: '#'
        },
        {
            title: 'Magang/Praktik Kerja',
            description: 'Program magang atau praktik kerja memberikan kesempatan kepada mahasiswa untuk mendapatkan pengalaman kerja langsung di industri atau instansi pemerintah.',
            benefits: [
                'Mendapatkan pengalaman kerja nyata',
                'Mengembangkan keterampilan profesional',
                'Membangun jaringan industri'
            ],
            link: '#'
        },
        {
            title: 'Asistensi Mengajar',
            description: 'Program asistensi mengajar memungkinkan mahasiswa untuk membantu proses pembelajaran di sekolah atau perguruan tinggi lain.',
            benefits: [
                'Mengembangkan kemampuan mengajar',
                'Meningkatkan pemahaman materi',
                'Mengasah kemampuan komunikasi'
            ],
            link: '#'
        },
        {
            title: 'Penelitian/Riset',
            description: 'Program penelitian atau riset memberikan kesempatan kepada mahasiswa untuk terlibat dalam proyek penelitian di perguruan tinggi atau lembaga penelitian.',
            benefits: [
                'Mengembangkan kemampuan penelitian',
                'Meningkatkan pemahaman metodologi penelitian',
                'Mengasah kemampuan analisis'
            ],
            link: '#'
        },
        {
            title: 'Proyek Kemanusiaan',
            description: 'Program proyek kemanusiaan memungkinkan mahasiswa untuk terlibat dalam kegiatan sosial dan kemanusiaan di masyarakat.',
            benefits: [
                'Mengembangkan kepedulian sosial',
                'Meningkatkan kemampuan kerja tim',
                'Mengasah kemampuan problem solving'
            ],
            link: '#'
        },
        {
            title: 'Kegiatan Wirausaha',
            description: 'Program kegiatan wirausaha memberikan kesempatan kepada mahasiswa untuk mengembangkan ide bisnis dan memulai usaha.',
            benefits: [
                'Mengembangkan jiwa kewirausahaan',
                'Meningkatkan kemampuan manajemen bisnis',
                'Mengasah kemampuan kreativitas'
            ],
            link: '#'
        }
    ]

    return (
        <AppLayout title="MBKM">
            <div className="container mx-auto px-4 py-8">
                <SectionTrigerScroll
                    id="mbkm-intro"
                    className="bg-white p-8 rounded-3xl shadow-xl mb-8"
                >
                    <h2 className="text-3xl font-bold text-main-blue mb-6">
                        Merdeka Belajar Kampus Merdeka (MBKM)
                    </h2>
                    <p className="text-lg text-gray-700 mb-6">
                        Program Merdeka Belajar Kampus Merdeka (MBKM) adalah program yang memberikan kesempatan kepada mahasiswa untuk belajar di luar program studinya selama 1 semester atau setara dengan 20 SKS. Program ini bertujuan untuk meningkatkan kompetensi lulusan, baik soft skills maupun hard skills, agar lebih siap dan relevan dengan kebutuhan zaman.
                    </p>
                    <div className="flex gap-4">
                        <Button
                            as={Link}
                            href="#"
                            className="bg-main-green text-white"
                        >
                            Panduan MBKM
                        </Button>
                        <Button
                            as={Link}
                            href="#"
                            className="bg-main-blue text-white"
                        >
                            Formulir Pendaftaran
                        </Button>
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id="mbkm-programs"
                    className="bg-white p-8 rounded-3xl shadow-xl"
                >
                    <h2 className="text-3xl font-bold text-main-blue mb-8">
                        Program MBKM yang Tersedia
                    </h2>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {mbkmPrograms.map((program, index) => (
                            <Card key={index} className="bg-gray-50">
                                <CardHeader>
                                    <h3 className="text-xl font-semibold text-main-blue">
                                        {program.title}
                                    </h3>
                                </CardHeader>
                                <CardBody>
                                    <p className="text-gray-700 mb-4">
                                        {program.description}
                                    </p>
                                    <div className="space-y-2 mb-4">
                                        <h4 className="font-semibold text-main-blue">
                                            Manfaat:
                                        </h4>
                                        <ul className="list-disc list-inside space-y-1">
                                            {program.benefits.map((benefit, idx) => (
                                                <li key={idx} className="text-gray-700">
                                                    {benefit}
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                    <Button
                                        as={Link}
                                        href={program.link}
                                        className="w-full bg-main-green text-white"
                                    >
                                        Daftar Sekarang
                                    </Button>
                                </CardBody>
                            </Card>
                        ))}
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default Mbkm 