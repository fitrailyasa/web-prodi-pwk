import BouncingAnimation from '@/Animation/BouncingAnimation'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import NextIcon from '@/Components/Icon/NextIcon'
import PrevIcon from '@/Components/Icon/PrevIcon'
import { SliderNews } from '@/Components/SliderNews'
import { DateFormater } from '@/Helper/DateFormater'
import AppLayout from '@/Layouts/AppLayout'
import { Button, Image } from '@nextui-org/react'
import React, { ReactNode, useRef, useState } from 'react'

const berita = [
    {
        title: 'Gelar LMBKA Karya Studio Setingkat Nasional',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    }
]

export default function Home() {
    const [pageIndicator, setPageIndicator] = useState<ReactNode>(null)
    const sliderRef = useRef<{
        sliderFunction: (newDirection: number) => void
    }>(null)

    const handleSlideBTN = (newDirection: number) => {
        sliderRef.current?.sliderFunction(newDirection)
    }
    // bg-gradient-to-r from-[#236899] from-10% to-transparent to-110%

    return (
        <AppLayout title="home">
            <div className="container mx-auto px-4 py-3">
                <SectionTrigerScroll className="">
                    <BouncingAnimation
                        index={0}
                        className="flex justify-between pb-2"
                    >
                        <div className="flex gap-2 items-center flex-wrap">
                            <h1 className="text-2xl font-bold pe-10">
                                Berita Terpopular
                            </h1>
                        </div>
                        <div className="flex gap-2">
                            <Button
                                onClick={() => handleSlideBTN(-1)}
                                className="bg-gray-200 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                            >
                                <PrevIcon
                                    className="justify-center flex"
                                    size={24}
                                />
                            </Button>
                            <Button
                                onClick={() => handleSlideBTN(-1)}
                                className="bg-gray-200 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                            >
                                <NextIcon
                                    className="justify-center flex"
                                    size={24}
                                />
                            </Button>
                        </div>
                    </BouncingAnimation>

                    <SliderNews
                        autoSlide={true}
                        ref={sliderRef}
                        getPageIndicator={setPageIndicator}
                        className="h-56 md:h-96 "
                    >
                        {berita.map((item, index) => (
                            <div
                                key={index}
                                className="w-full h-56 md:h-96 bg-cover bg-center rounded-3xl overflow-hidden border shadow-xl bg-white"
                            >
                                <div className="grid grid-cols-2 rounded-3xl bg-sk">
                                    <div className="relative">
                                        <div className=" absolute bottom-0 right-0  bg-main-blue bg-opacity-40 self-end h-8 w-10"></div>
                                        <p className="absolute rounded-3xl w-full bg-white h-full flex flex-1 px-5 items-center text-2xl font-bold z-10">
                                            Kategori Berita
                                        </p>
                                    </div>
                                    <div className="bg-white  rounded-t-3xl overflow-hidden">
                                        <div className="bg-main-blue bg-opacity-40 py-4 px-4 flex">
                                            <Button className="bg-main-green font-semibold text-white inline-block rounded-lg">
                                                Baca Selengkapnya
                                            </Button>
                                        </div>
                                    </div>
                                </div>
                                <div className="bg-main-blue bg-opacity-40 col-span-2 rounded-l-3xl rounded-b-3xl p-4">
                                    <div className="grid grid-cols-5 justify-between ">
                                        <div className="col-span-3 overflow-hidden h-full">
                                            <p className="text-white  text-md md:text-4xl pb-1 md:pb-10 font-semibold md:font-bold me-2 md:me-10 overflow-hidden line-clamp-3">
                                                {item.title}
                                            </p>
                                            <div className="">
                                                <p className="text-black text-xs md:text-sm ">
                                                    {DateFormater({
                                                        date: item.date
                                                    })}
                                                </p>
                                                <div className="flex gap-2 py-2">
                                                    {pageIndicator}
                                                </div>
                                            </div>
                                        </div>
                                        <BouncingAnimation
                                            index={3}
                                            className="col-span-2 relative -end-5 -top-2 md:-top-8 lg:-top-14 aspect-square"
                                        >
                                            <div className="rounded-full overflow-hidden border-3 border-main-green p-2">
                                                <Image
                                                    src={item.image}
                                                    alt={item.title}
                                                    className=" aspect-square object-cover object-bottom rounded-full"
                                                />
                                            </div>
                                            <div className="absolute -left-8 top-0 md:-left-12 md:top-10 lg:-left-20 w-20 h-20 lg:w-40 lg:h-40 bg-main-blue shadow-lg shadow-black/25 backdrop-blur-md rounded-full opacity-65 z-0"></div>
                                            <div className="absolute bottom-0 left-2 md:left-10 w-10 h-10 lg:w-28 lg:h-28 bg-yellow-400 shadow-lg shadow-black/25 backdrop-blur-md opacity-80  rounded-tl-[70%] rounded-tr-full rounded-br-[30%] z-10"></div>
                                        </BouncingAnimation>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </SliderNews>
                </SectionTrigerScroll>

                <SectionTrigerScroll className="mt-10">
                    <h1 className="text-4xl font-bold">ini home</h1>
                </SectionTrigerScroll>

                <SectionTrigerScroll className="mt-10 h-screen bg-blue-500">
                    <h1 className="text-4xl font-bold">ini home</h1>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}
