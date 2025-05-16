import BouncingAnimation from '@/Animation/BouncingAnimation'
import CountAnimation from '@/Animation/CountAnimation'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import ControlCenterMac from '@/Components/ControlCenterMac'
import MultyPersonIcon from '@/Components/Icon/MultyPersonIcon'
import NextIcon from '@/Components/Icon/NextIcon'
import PrevIcon from '@/Components/Icon/PrevIcon'
import TargetIcon from '@/Components/Icon/TargetInco'
import { Slider } from '@/Components/Slider'
import BgImageComponent from '@/Components/Utils/BgImage'
import EvenContainer from '@/Components/home/EvenContainer'
import PathnerContainer from '@/Components/home/PathnerContainer'
import { SliderNews } from '@/Components/home/SliderNews'
import { logoBox, TestImage } from '@/Constants'
import { DateFormater } from '@/Helper/DateFormater'
import { useTranslation } from '@/Hooks/useTranslation'
import AppLayout from '@/Layouts/AppLayout'
import { useVisitor } from '@/Providers/VisitorProvider'
import { HomeProps, StorageProps } from '@/types'
import { Button, image, Image, Link } from '@heroui/react'
import { router, usePage } from '@inertiajs/react'
import { useScroll } from 'framer-motion'
import { ReactNode, useEffect, useRef, useState } from 'react'

export default function Home({
    popularNews,
    statistic,
    aboutPWK,
    event,
    patner
}: HomeProps) {
    const [pageIndicator, setPageIndicator] = useState<ReactNode>(null)
    const sliderRef = useRef<{
        sliderFunction: (newDirection: number) => void
    }>(null)
    const { storage } = usePage<{
        storage: StorageProps
    }>().props

    const visitorCount = useVisitor()

    // console.log('visitorCount', visitorCount)

    const newsCurentRef = useRef(null)
    const [isInView, setIsInView] = useState(false)

    const newsScorllObserver = useScroll({
        target: newsCurentRef
    })

    const handleSlideBTN = (newDirection: number) => {
        sliderRef.current?.sliderFunction(newDirection)
    }

    newsScorllObserver.scrollYProgress.on('change', value => {
        if (value > 0) {
            setIsInView(true)
        } else {
            setIsInView(false)
        }
    })
    useEffect(() => {
        handleSlideBTN(1)
    }, [isInView])
    const handleClick = (slug: string) => {
        //navigate to news detail
        router.get(route('berita.show', { slug }))
    }

    const pathner = [
        {
            title: 'Universitas Indonesia',
            image: TestImage,
            link: 'https://www.ui.ac.id/'
        },
        {
            title: 'Institut Teknologi Bandung',
            image: TestImage,
            link: 'https://www.itb.ac.id/'
        },
        {
            title: 'Universitas Diponegoro',
            image: TestImage,
            link: 'https://www.undip.ac.id/'
        },
        {
            title: 'Universitas Kristen Satya Wacana',
            image: TestImage,
            link: 'https://www.uksw.edu/'
        },
        {
            title: 'Universitas Kristen Satya Wacana',
            image: TestImage,
            link: 'https://www.uksw.edu/'
        },
        {
            title: 'Universitas Kristen Satya Wacana',
            image: TestImage,
            link: 'https://www.uksw.edu/'
        },
        {
            title: 'Universitas Kristen Satya Wacana',
            image: TestImage,
            link: 'https://www.uksw.edu/'
        }
    ]

    return (
        <AppLayout title="home">
            <div className="container mx-auto px-4 py-3 relative">
                <SectionTrigerScroll id={'beritaslider'} className="">
                    <div ref={newsCurentRef}>
                        <BouncingAnimation
                            index={0}
                            className="flex justify-between pb-2"
                        >
                            <div className="flex gap-2 items-center flex-wrap">
                                <h1 className="text-sm md:text-2xl font-bold pe-10 text-main-blue-light">
                                    {useTranslation('Berita Terpopuler')}
                                </h1>
                            </div>
                            <div className="flex gap-2">
                                <Button
                                    size="sm"
                                    onPress={() => handleSlideBTN(-1)}
                                    className="bg-gray-200 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                                >
                                    <PrevIcon
                                        className="justify-center flex"
                                        size={2}
                                    />
                                </Button>
                                <Button
                                    size="sm"
                                    onPress={() => handleSlideBTN(1)}
                                    className="bg-gray-200 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                                >
                                    <NextIcon
                                        className="justify-center flex"
                                        size={2}
                                    />
                                </Button>
                            </div>
                        </BouncingAnimation>

                        <SliderNews
                            autoSlide={isInView}
                            ref={sliderRef}
                            getPageIndicator={setPageIndicator}
                            className="h-56 md:h-96 "
                        >
                            {popularNews.map((item, index) => {
                                const imageLink = item.image
                                    ? storage.link + item.image
                                    : TestImage
                                return (
                                    <div
                                        key={index}
                                        className="w-full h-56 md:h-96 bg-cover bg-center rounded-3xl overflow-hidden border shadow-xl bg-white"
                                    >
                                        <div className="grid grid-cols-2 rounded-3xl bg-sk">
                                            <div className="relative">
                                                <div className=" absolute bottom-0 right-0  bg-main-blue bg-opacity-40 self-end h-8 w-10"></div>
                                                <p className="absolute rounded-3xl w-full bg-white h-full flex flex-1 px-5 items-center text-sm md:text-2xl font-bold z-10 text-main-blue-light">
                                                    {useTranslation(
                                                        item.tag ?? ''
                                                    )}
                                                </p>
                                            </div>
                                            <div className="bg-white  rounded-t-3xl overflow-hidden">
                                                <div className="bg-main-blue bg-opacity-40 p-2 md:py-4 md:px-4 flex">
                                                    <Button
                                                        onPress={() =>
                                                            handleClick(
                                                                item.slug
                                                            )
                                                        }
                                                        // size="md" // Lebih responsif dan readable
                                                        className="bg-main-green text-sm md:text-base px-4 py-1 md:px-6 md:py-3 text-white font-semibold rounded-lg w-full sm:w-auto"
                                                    >
                                                        {useTranslation(
                                                            'Baca Selengkapnya'
                                                        )}
                                                    </Button>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="bg-main-blue bg-opacity-40 col-span-2 rounded-l-3xl rounded-b-3xl p-4">
                                            <div className="grid grid-cols-5 justify-between ">
                                                <div className="col-span-3 overflow-hidden h-full">
                                                    <ControlCenterMac className="pb-3" />
                                                    <p className="text-white  text-md md:text-4xl pb-1 md:pb-10 font-semibold md:font-bold me-2 md:me-10 overflow-hidden line-clamp-3">
                                                        {useTranslation(
                                                            item.title
                                                        )}
                                                    </p>
                                                    <div className="">
                                                        <p className="text-black text-xs md:text-sm ">
                                                            {useTranslation(
                                                                DateFormater({
                                                                    date: item.date
                                                                })
                                                            )}
                                                        </p>
                                                        <div className="flex gap-2 py-2">
                                                            {pageIndicator}
                                                        </div>
                                                    </div>
                                                </div>
                                                <BouncingAnimation
                                                    key={index}
                                                    className="col-span-2 relative -end-2 -top-2 md:-top-5 lg:-top-6 aspect-square"
                                                >
                                                    <div className="w-[100%] md:w-[90%] rounded-xl md:rounded-3xl overflow-hidden border-2 md:border-3 border-main-green p-0.5 md:p-2">
                                                        <Image
                                                            src={imageLink}
                                                            alt={item.title}
                                                            className=" aspect-square md:aspect-video object-cover rounded-xl md:rounded-3xl bg-white"
                                                        />
                                                    </div>
                                                    <div className="absolute -left-8 top-0 md:-left-12 md:top-10 lg:-left-20 w-20 h-20 lg:w-40 lg:h-40 bg-main-blue shadow-lg shadow-black/25 backdrop-blur-md rounded-full opacity-65 z-0"></div>
                                                    <div className="absolute -bottom-3 left-2 md:left-10 w-10 h-10 lg:w-28 lg:h-28 bg-yellow-400 shadow-lg shadow-black/25 backdrop-blur-md opacity-80  rounded-tl-[70%] rounded-tr-full rounded-br-[30%] -z-1"></div>
                                                </BouncingAnimation>
                                            </div>
                                        </div>
                                    </div>
                                )
                            })}
                        </SliderNews>
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id={'statistik'}
                    macControlCenter
                    className="mt-5 md:mt-10 bg-white p-2 md:p-5 rounded-3xl shadow-xl"
                >
                    <div className=" grid grid-cols-1 md:grid-cols-2 gap-10 justify-between">
                        <div className=" grid grid-cols-2 gap-5">
                            <div className="flex gap-4 bg-secondary-blue bg-opacity-30 p-4 rounded-3xl">
                                <MultyPersonIcon
                                    size={2}
                                    className="text-md md:text-4xl stroke-main-green fill-main-green"
                                />
                                <div className="flex flex-col gap-1">
                                    <CountAnimation
                                        from={0}
                                        to={statistic.total_mahasiswa}
                                        duration={2}
                                        className="font-bold text-md md:text-4xl text-main-green"
                                    />
                                    <p className="font-semibold text-sm md:text-lg text-main-blue-light">
                                        {useTranslation('Mahasiswa')}
                                    </p>
                                </div>
                            </div>
                            <div className="flex gap-1 md:gap-4 bg-secondary-blue bg-opacity-30 p-4 rounded-3xl">
                                <MultyPersonIcon
                                    size={2}
                                    className="text-md md:text-4xl stroke-main-green fill-main-green"
                                />
                                <div className="flex flex-col gap-1">
                                    <CountAnimation
                                        from={0}
                                        to={statistic.total_dosen}
                                        duration={2}
                                        className="font-bold text-md md:text-4xl text-main-green"
                                    />
                                    <p className="font-semibold text-sm md:text-lg text-main-blue-light">
                                        {useTranslation('Dosen')}
                                    </p>
                                </div>
                            </div>

                            <div className=" flex col-span-2 gap-4 bg-secondary-blue bg-opacity-30 p-4 rounded-3xl">
                                <MultyPersonIcon
                                    size={2}
                                    className="text-md md:text-4xl stroke-main-green fill-main-green"
                                />
                                <div className="flex flex-col gap-1">
                                    <CountAnimation
                                        from={0}
                                        to={statistic.total_tendik}
                                        duration={2}
                                        className="font-bold text-md md:text-4xl text-main-green"
                                    />
                                    <p className="font-semibold text-sm md:text-lg text-main-blue-light">
                                        {useTranslation('Staf Akademik')}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className="">
                            <h1 className="font-bold text-xl md:text-4xl text-main-blue-light">
                                Perencanaan Wilayah dan Kota
                            </h1>
                            <h1 className="font-bold text-xl md:text-4xl text-main-green py-1 md:py-3">
                                ITERA
                            </h1>
                            <p className="py-4 font-semibold text-md md:text-lg">
                                {useTranslation(
                                    'We reached here with our hard work and dedication'
                                )}
                            </p>
                        </div>
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id={'tentang'}
                    macControlCenter
                    className="mt-5 md:mt-10 bg-white p-2 md:p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-lg md:text-3xl text-main-blue-light pb-4 border-b mb-3">
                        {useTranslation('Tentang PWK ITERA')}
                    </h2>
                    <div className=" grid grid-cols-2 md:grid-cols-5 gap-10 justify-center md:justify-between">
                        <div className="col-span-2 md:col-span-3">
                            <h1 className="text-xl text-main-blue-light md:text-4xl font-bold">
                                Perencanaan Wilayah Dan Kota ITERA
                            </h1>
                            <p className="py-2 text-sm md:text-md">
                                {useTranslation(aboutPWK.deskripsi)}
                            </p>
                        </div>
                        <div className="col-span-2 flex justify-center items-center">
                            <Image
                                src={logoBox}
                                alt="logo_pwak"
                                className="aspect-video w-full h-full mx-auto rounded-3xl"
                            />
                        </div>
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id={'visi'}
                    macControlCenter
                    className="mt-5 md:mt-10 bg-white p-2 md:p-5 rounded-3xl shadow-xl"
                >
                    <h2 className="font-bold text-main-blue-light text-lg md:text-3xl pb-1 md:pb-4 border-b mb-1 md:mb-3 mt-1 md:mt-10">
                        Visi
                    </h2>
                    <div className="  md:grid-cols-5 gap-10 justify-between">
                        <div className="col-span-3">
                            <p className="py-2 md:text-md text-sm">
                                {useTranslation(aboutPWK.visi)}
                            </p>
                        </div>
                    </div>

                    <h2 className="font-bold text-main-blue-light text-lg md:text-3xl pb-1 md:pb-4 border-b mb-1 md:mb-3 mt-1 md:mt-10">
                        Misi
                    </h2>
                    <div className="flex flex-col gap-3 justify-between">
                        {aboutPWK.misi.map((item, index) => (
                            <div
                                key={index}
                                className="border p-3 rounded-2xl flex gap-3 items-center"
                            >
                                <TargetIcon
                                    size={2}
                                    className="stroke-main-green text-md md:text-3xl fill-main-green w-28"
                                />
                                <p className="py-2 md:text-md text-sm">
                                    {useTranslation(item.title)}
                                </p>
                            </div>
                        ))}
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id={'Patner'}
                    macControlCenter
                    className="mt-5 md:mt-10 bg-white p-2 md:p-5 rounded-3xl shadow-xl"
                >
                    <div className="flex justify-between">
                        <h2 className="font-bold text-lg md:text-3xl text-main-blue-light pb-4 border-b mb-3">
                            {useTranslation('Patner Kerjasama')}
                        </h2>

                        {/* <Link href={route('akademik.kalender-akademik')}>
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                {useTranslation('Lihat Semua')}
                            </Button>
                        </Link> */}
                    </div>
                    {/* <Slider> */}
                    <div className="flex flex-wrap gap-5 justify-center items-start">
                        {patner && patner.length > 0 ? (
                            patner.map((item, index) => (
                                <PathnerContainer
                                    key={index}
                                    title={item.title}
                                    link={item.link}
                                    image={item.image}
                                />
                            ))
                        ) : (
                            <div className="flex justify-center items-center">
                                <p className="text-sm md:text-lg font-semibold text-main-blue-light">
                                    {useTranslation('Tidak ada data')}
                                </p>
                            </div>
                        )}
                        {/* </Slider> */}
                    </div>
                </SectionTrigerScroll>
                <SectionTrigerScroll
                    id={'even'}
                    macControlCenter
                    className="mt-5 md:mt-10 bg-white p-2 md:p-5 rounded-3xl shadow-xl"
                >
                    <div className="flex justify-between">
                        <h2 className="font-bold text-lg md:text-3xl text-main-blue-light pb-4 border-b mb-3">
                            {useTranslation('Kalender Akademik')}
                        </h2>

                        <Link href={route('akademik.kalender-akademik')}>
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                {useTranslation('Lihat Semua')}
                            </Button>
                        </Link>
                    </div>
                    <div className="flex flex-wrap gap-3">
                        {event.map((item, index) => (
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
            </div>
        </AppLayout>
    )
}
