import React from 'react'
import AppLayout from '@/Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Card, CardBody } from '@heroui/react'

const VisiMisi: React.FC = () => {
    return (
        <AppLayout title="Visi & Misi">
            <div className="container mx-auto px-4 py-8">
                <SectionTrigerScroll
                    id="visi"
                    className="bg-white p-8 rounded-3xl shadow-xl mb-8"
                >
                    <h2 className="text-3xl font-bold text-main-blue mb-6">
                        Visi
                    </h2>
                    <p className="text-lg text-gray-700">
                        Menjadi Program Studi Perencanaan Wilayah dan Kota yang
                        unggul dalam pengembangan ilmu pengetahuan dan teknologi
                        di bidang perencanaan wilayah dan kota yang berwawasan
                        lingkungan dan berkelanjutan di tingkat nasional pada
                        tahun 2030.
                    </p>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id="misi"
                    className="bg-white p-8 rounded-3xl shadow-xl"
                >
                    <h2 className="text-3xl font-bold text-main-blue mb-6">
                        Misi
                    </h2>
                    <div className="space-y-4">
                        <Card className="bg-gray-50">
                            <CardBody>
                                <p className="text-lg text-gray-700">
                                    1. Menyelenggarakan pendidikan tinggi di
                                    bidang perencanaan wilayah dan kota yang
                                    berkualitas dan berdaya saing.
                                </p>
                            </CardBody>
                        </Card>
                        <Card className="bg-gray-50">
                            <CardBody>
                                <p className="text-lg text-gray-700">
                                    2. Mengembangkan penelitian di bidang
                                    perencanaan wilayah dan kota yang inovatif
                                    dan bermanfaat bagi masyarakat.
                                </p>
                            </CardBody>
                        </Card>
                        <Card className="bg-gray-50">
                            <CardBody>
                                <p className="text-lg text-gray-700">
                                    3. Melaksanakan pengabdian kepada masyarakat
                                    di bidang perencanaan wilayah dan kota yang
                                    berkelanjutan.
                                </p>
                            </CardBody>
                        </Card>
                        <Card className="bg-gray-50">
                            <CardBody>
                                <p className="text-lg text-gray-700">
                                    4. Membangun kerjasama dengan berbagai pihak
                                    untuk pengembangan ilmu pengetahuan dan
                                    teknologi di bidang perencanaan wilayah dan
                                    kota.
                                </p>
                            </CardBody>
                        </Card>
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}

export default VisiMisi
