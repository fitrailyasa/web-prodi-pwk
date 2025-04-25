import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Card, CardBody, CardHeader } from '@heroui/react'

const KelompokKeahlian: React.FC = () => {
    const kelompokKeahlian = [
        {
            name: 'Kelompok Keahlian Perencanaan Wilayah',
            description:
                'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang perencanaan wilayah, termasuk perencanaan tata ruang, pengembangan wilayah, dan manajemen sumber daya alam.',
            bidang: [
                'Perencanaan Tata Ruang',
                'Pengembangan Wilayah',
                'Manajemen Sumber Daya Alam'
            ]
        },
        {
            name: 'Kelompok Keahlian Perencanaan Kota',
            description:
                'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang perencanaan kota, termasuk perencanaan transportasi, perumahan, dan infrastruktur perkotaan.',
            bidang: [
                'Perencanaan Transportasi',
                'Perencanaan Perumahan',
                'Perencanaan Infrastruktur Perkotaan'
            ]
        },
        {
            name: 'Kelompok Keahlian Lingkungan',
            description:
                'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang lingkungan, termasuk pengelolaan lingkungan, mitigasi bencana, dan adaptasi perubahan iklim.',
            bidang: [
                'Pengelolaan Lingkungan',
                'Mitigasi Bencana',
                'Adaptasi Perubahan Iklim'
            ]
        }
    ]

    return (
        <AppLayout title="Kelompok Keahlian">
            <div className="container mx-auto px-4 py-8">
                <SectionTrigerScroll
                    id="kelompok-keahlian"
                    className="bg-white p-8 rounded-3xl shadow-xl"
                >
                    <h2 className="text-3xl font-bold text-main-blue mb-8">
                        Kelompok Keahlian Program Studi PWK ITERA
                    </h2>

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {kelompokKeahlian.map((kelompok, index) => (
                            <Card key={index} className="bg-gray-50">
                                <CardHeader className="pb-0">
                                    <h3 className="text-xl font-semibold text-main-blue">
                                        {kelompok.name}
                                    </h3>
                                </CardHeader>
                                <CardBody>
                                    <p className="text-gray-700 mb-4">
                                        {kelompok.description}
                                    </p>
                                    <div className="space-y-2">
                                        <h4 className="font-semibold text-main-blue">
                                            Bidang Keahlian:
                                        </h4>
                                        <ul className="list-disc list-inside space-y-1">
                                            {kelompok.bidang.map(
                                                (bidang, idx) => (
                                                    <li
                                                        key={idx}
                                                        className="text-gray-700"
                                                    >
                                                        {bidang}
                                                    </li>
                                                )
                                            )}
                                        </ul>
                                    </div>
                                </CardBody>
                            </Card>
                        ))}
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default KelompokKeahlian
