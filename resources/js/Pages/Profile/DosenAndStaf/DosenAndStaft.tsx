import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import DosenAndStafCard from '@/Components/Profile/DosenCard'
import { TestImage } from '@/Constants'
import AppLayout from '@/Layouts/AppLayout'
import { DosenCardType } from '@/types'
import { Button, Card, CardBody, Image, Link } from '@nextui-org/react'
import React from 'react'

const DosenAndStaf: React.FC = () => {
    const DataKoordianator: DosenCardType = {
        name: 'Dr. Ir. M. Syahril, M.T.',
        position: 'Koordinator Program Studi Pwk Itera',
        image: TestImage,
        id: 1
    }

    const dataDosen: Array<DosenCardType> = [
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'sekertaris program studi pwk itera',
            image: TestImage,
            id: 1
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'Bendahara Program Studi Pwk Itera',
            image: TestImage,
            id: 2
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'Koordinator Kurikulum Program Studi Pwk Itera',
            image: TestImage,
            id: 3
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'Koordinator Laboratorium Program Studi Pwk Itera',
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'Koordinator Humas Program Studi Pwk Itera',
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'Koordinator Kemahasiswaan Program Studi Pwk Itera',
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            // position
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            // position
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            // position
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            // position
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            // position
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            // position
            image: TestImage,
            id: 4
        },
        {
            name: 'Dr. Ir. M. Syahril, M.T.',
            position: 'staf',
            image: TestImage,
            id: 4
        }
    ]

    return (
        <AppLayout title="Dosent & Staf">
            <div className="container mx-auto px-4 py-3 relative">
                <SectionTrigerScroll id="list-berita" className="mt-10 p-5 ">
                    <h2 className="font-bold text-3xl pb-4">
                        Koordinator Program Studi PWK ITERA
                    </h2>

                    <div className="flex justify-center">
                        <DosenAndStafCard staf={DataKoordianator} />
                    </div>
                </SectionTrigerScroll>
                <SectionTrigerScroll id="list-berita" className="mt-10 p-5 ">
                    <h2 className="font-bold text-3xl pb-4">
                        Pengurus Program Studi PWK ITERA
                    </h2>

                    <div className="flex flex-wrap gap-7 justify-center">
                        {dataDosen
                            .filter(
                                item =>
                                    item.position &&
                                    item.position?.toLowerCase() !== 'staf'
                            )
                            .map((item, index) => (
                                <DosenAndStafCard key={index} staf={item} />
                            ))}
                    </div>
                </SectionTrigerScroll>
                <SectionTrigerScroll id="list-berita" className="mt-10 p-5 ">
                    <h2 className="font-bold text-3xl pb-4">
                        Dosen Program Studi PWK ITERA
                    </h2>

                    <div className="flex flex-wrap gap-7 justify-center">
                        {dataDosen
                            .filter(item => !item.position)
                            .map((item, index) => (
                                <DosenAndStafCard key={index} staf={item} />
                            ))}
                    </div>
                </SectionTrigerScroll>
                <SectionTrigerScroll id="list-berita" className="mt-10 p-5 ">
                    <h2 className="font-bold text-3xl pb-4">Tendik Dan Staf</h2>

                    <div className="flex flex-wrap gap-7 justify-center">
                        {dataDosen
                            .filter(
                                item =>
                                    item.position &&
                                    item.position?.toLowerCase() === 'staf'
                            )
                            .map((item, index) => (
                                <DosenAndStafCard key={index} staf={item} />
                            ))}
                    </div>
                </SectionTrigerScroll>
                {/* <SectionTrigerScroll
                    id={'visi'}
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Kalender Akademik ITERA 2024-2025
                    </h2>
                    <div className="">
                        <Link href="#">
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                Download
                            </Button>
                        </Link>
                    </div>
                </SectionTrigerScroll> */}
            </div>
        </AppLayout>
    )
}

export default DosenAndStaf
