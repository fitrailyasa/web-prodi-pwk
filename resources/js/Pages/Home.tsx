import BouncingAnimation from '@/Animation/BouncingAnimation'
import CountAnimation from '@/Animation/CountAnimation'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import ControlCenterMac from '@/Components/ControlCenterMac'
import MultyPersonIcon from '@/Components/Icon/MultyPersonIcon'
import NextIcon from '@/Components/Icon/NextIcon'
import PrevIcon from '@/Components/Icon/PrevIcon'
import EvenContainer from '@/Components/home/EvenContainer'
import { SliderNews } from '@/Components/home/SliderNews'
import {
    beritaConstants,
    eventsConstants,
    logoBox,
    misiConstants
} from '@/Constants'
import { DateFormater } from '@/Helper/DateFormater'
import AppLayout from '@/Layouts/AppLayout'
import { Button, Image } from '@nextui-org/react'
import React, { ReactNode, useRef, useState } from 'react'

export default function Home() {
    const [pageIndicator, setPageIndicator] = useState<ReactNode>(null)
    const sliderRef = useRef<{
        sliderFunction: (newDirection: number) => void
    }>(null)

    const handleSlideBTN = (newDirection: number) => {
        sliderRef.current?.sliderFunction(newDirection)
    }

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
                        {beritaConstants.map((item, index) => (
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
                                            <ControlCenterMac className="pb-3" />
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
                {/* //stratistik section */}
                <SectionTrigerScroll
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-10 justify-between">
                        <div className=" grid grid-cols-2 gap-5">
                            <div className="flex gap-4 bg-secondary-blue bg-opacity-30 p-4 rounded-3xl">
                                <MultyPersonIcon
                                    size={74}
                                    className="stroke-main-green fill-main-green"
                                />
                                <div className="flex flex-col gap-1">
                                    <CountAnimation
                                        from={0}
                                        to={100}
                                        duration={2}
                                        className="font-bold text-4xl text-main-green"
                                    />
                                    <p className="font-semibold text-lg">
                                        Mahasiswa
                                    </p>
                                </div>
                            </div>
                            <div className="flex gap-4 bg-secondary-blue bg-opacity-30 p-4 rounded-3xl">
                                <MultyPersonIcon
                                    size={74}
                                    className="stroke-main-green fill-main-green"
                                />
                                <div className="flex flex-col gap-1">
                                    <CountAnimation
                                        from={0}
                                        to={100}
                                        duration={2}
                                        className="font-bold text-4xl text-main-green"
                                    />
                                    <p className="font-semibold text-lg">
                                        Dosen
                                    </p>
                                </div>
                            </div>

                            <div className=" flex gap-4 bg-secondary-blue bg-opacity-30 p-4 rounded-3xl">
                                <MultyPersonIcon
                                    size={74}
                                    className="stroke-main-green fill-main-green"
                                />
                                <div className="flex flex-col gap-1">
                                    <CountAnimation
                                        from={0}
                                        to={100}
                                        duration={2}
                                        className="font-bold text-4xl text-main-green"
                                    />
                                    <p className="font-semibold text-lg">
                                        tendik
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className="">
                            <h1 className="font-bold text-4xl">
                                Perencanaan Wilayah dan Kota
                            </h1>
                            <h1 className="font-bold text-4xl text-main-green py-3">
                                ITERA
                            </h1>
                            <p className="py-4 font-semibold text-lg">
                                We reached here with our hard work and
                                dedication
                            </p>
                        </div>
                    </div>
                </SectionTrigerScroll>
                {/* // abauth section */}
                <SectionTrigerScroll
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Tentan PWK ITERA
                    </h2>
                    <div className=" grid grid-cols-2 md:grid-cols-5 gap-10 justify-between">
                        <div className="col-span-3">
                            <h1 className="text-4xl font-bold">
                                Perencanaan Wilayah Dan Kota ITERA
                            </h1>
                            <p className="py-2">
                                Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Natus sapiente eaque deleniti
                                reiciendis sunt explicabo consectetur quae sequi
                                itaque maiores? Impedit aspernatur eum animi
                                provident! Perferendis eveniet adipisci sequi
                                quisquam?
                            </p>

                            <Button className="bg-main-green font-semibold text-white inline-block">
                                Baca Selengkapnya
                            </Button>
                        </div>
                        <div className="col-span-2">
                            <div
                                className="flex-1 h-full border rounded-2xl"
                                style={{
                                    background:
                                        'url(/assets/img/logo-box.png) center top no-repeat'
                                }}
                            ></div>
                        </div>
                    </div>
                </SectionTrigerScroll>
                {/* // visi misi */}
                <SectionTrigerScroll
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Visi
                    </h2>
                    <div className=" grid grid-cols-2 md:grid-cols-5 gap-10 justify-between">
                        <div className="col-span-2">
                            <Image src={logoBox} className="" />
                        </div>
                        <div className="col-span-3">
                            <p className="py-2">
                                Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Natus sapiente eaque deleniti
                                reiciendis sunt explicabo consectetur quae sequi
                                itaque maiores? Impedit aspernatur eum animi
                                provident! Perferendis eveniet adipisci sequi
                                quisquam?
                            </p>
                        </div>
                    </div>
                </SectionTrigerScroll>
                {/* misi */}
                <SectionTrigerScroll
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Misi
                    </h2>
                    <div className="flex flex-col gap-3 justify-between">
                        {misiConstants.map((item, index) => (
                            <div className="border p-3 rounded-2xl flex gap-3 items-center">
                                <MultyPersonIcon
                                    size={60}
                                    className="stroke-main-green fill-main-green"
                                />
                                <p className="py-2">{item.title}</p>
                            </div>
                        ))}
                    </div>
                </SectionTrigerScroll>

                {/* even section */}
                <SectionTrigerScroll
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Even Terdekat
                    </h2>
                    <div className="flex flex-wrap gap-3">
                        {eventsConstants.map((item, index) => (
                            <EvenContainer
                                key={index}
                                title={item.title}
                                date={item.date}
                                dateStart={item.dateStart}
                                dateEnd={item.dateEnd}
                                description={item.description}
                            />
                        ))}
                    </div>
                </SectionTrigerScroll>

                {/* med pat */}
                <SectionTrigerScroll
                    macControlCenter
                    className="mt-10 bg-white p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                        Media Partner
                    </h2>
                    <div className="flex flex-wrap gap-3">
                        {eventsConstants.map((item, index) => (
                            <EvenContainer
                                key={index}
                                title={item.title}
                                date={item.date}
                                dateStart={item.dateStart}
                                dateEnd={item.dateEnd}
                                description={item.description}
                            />
                        ))}
                    </div>
                </SectionTrigerScroll>

                {/* other section  */}
                {/* <SectionTrigerScroll className="mt-10 h-screen bg-blue-500">
                    <h1 className="text-4xl font-bold">ini home</h1>
                </SectionTrigerScroll> */}
            </div>
        </AppLayout>
    )
}
