import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Card, CardBody } from '@heroui/react'

const Sejarah: React.FC = () => {
    const timelineEvents = [
        {
            year: '2014',
            title: 'Pendirian Program Studi',
            description:
                'Program Studi Perencanaan Wilayah dan Kota (PWK) Institut Teknologi Sumatera (ITERA) didirikan sebagai salah satu program studi di bawah naungan Fakultas Teknik Sipil dan Perencanaan (FTSP) ITERA.'
        },
        {
            year: '2015',
            title: 'Penerimaan Mahasiswa Pertama',
            description:
                'Program Studi PWK ITERA menerima mahasiswa angkatan pertama dan memulai proses pembelajaran dengan kurikulum yang disesuaikan dengan kebutuhan industri dan perkembangan ilmu pengetahuan.'
        },
        {
            year: '2018',
            title: 'Akreditasi Pertama',
            description:
                'Program Studi PWK ITERA mendapatkan akreditasi pertama dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) sebagai pengakuan atas kualitas pendidikan yang diselenggarakan.'
        },
        {
            year: '2020',
            title: 'Pengembangan Laboratorium',
            description:
                'Program Studi PWK ITERA mengembangkan laboratorium untuk mendukung proses pembelajaran dan penelitian di bidang perencanaan wilayah dan kota.'
        },
        {
            year: '2023',
            title: 'Kerjasama dengan Industri',
            description:
                'Program Studi PWK ITERA menjalin kerjasama dengan berbagai instansi pemerintah dan swasta untuk meningkatkan kualitas pendidikan dan penelitian.'
        }
    ]

    return (
        <AppLayout title="Sejarah">
            <div className="container mx-auto px-4 py-8">
                <SectionTrigerScroll
                    id="sejarah"
                    className="bg-white p-8 rounded-3xl shadow-xl"
                >
                    <h2 className="text-3xl font-bold text-main-blue mb-8">
                        Sejarah Program Studi PWK ITERA
                    </h2>

                    <div className="relative">
                        {/* Timeline line */}
                        <div className="absolute left-0 top-0 h-full w-1 bg-main-green"></div>

                        <div className="space-y-8">
                            {timelineEvents.map((event, index) => (
                                <div key={index} className="relative pl-8">
                                    {/* Timeline dot */}
                                    <div className="absolute left-0 top-0 w-4 h-4 rounded-full bg-main-green transform -translate-x-1/2"></div>

                                    <Card className="bg-gray-50">
                                        <CardBody>
                                            <div className="flex items-center gap-4 mb-4">
                                                <span className="text-2xl font-bold text-main-blue">
                                                    {event.year}
                                                </span>
                                                <h3 className="text-xl font-semibold text-main-blue">
                                                    {event.title}
                                                </h3>
                                            </div>
                                            <p className="text-gray-700">
                                                {event.description}
                                            </p>
                                        </CardBody>
                                    </Card>
                                </div>
                            ))}
                        </div>
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default Sejarah
