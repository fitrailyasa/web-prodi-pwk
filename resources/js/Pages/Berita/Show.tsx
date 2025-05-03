import { Link, usePage } from '@inertiajs/react'
import AppLayout from '../../Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { beritaConstants, TestImage } from '@/Constants'
import NewsItem from '@/Components/News/NewsItem'
import { Button, Image } from '@heroui/react'
import BouncingAnimation from '@/Animation/BouncingAnimation'
import { DateFormater } from '@/Helper/DateFormater'
import ControlCenterMac from '@/Components/ControlCenterMac'
import { useTranslation } from '@/Hooks/useTranslation'
import { StorageProps } from '@/types'

type ShowBeritaPageProps = {
    berita: {
        desc: string
        event_date: Date
        img: string
        name: string
        publish_date: Date
        slug: string
        tag: {
            name: string

            slug: string
        }
        views: number
    } | null
    otherNews: Array<{
        id: number
        judul: string
        image: string
        slug: string
        tag: string
        description: string
        date: string
        see: number
    }>
}
export default function ShowBeritaPage({
    berita,
    otherNews
}: ShowBeritaPageProps) {
    const { storage } = usePage<{
        storage: StorageProps
    }>().props
    if (!berita) {
        return (
            <AppLayout title={'Berita'}>
                <div className="container mx-auto px-4 py-3 relative min-h-[74vh]">
                    <h1 className="text-3xl font-bold">{''}</h1>
                    <div className="mt-10 bg-white p-5 rounded-3xl shadow-xl">
                        <ControlCenterMac />
                        <p>Tidak ada berita tersedia</p>
                    </div>
                </div>
            </AppLayout>
        )
    }
    const imageLink = berita.img ? storage.link + berita.img : TestImage
    return (
        <AppLayout title={'Berita'}>
            <div className="container mx-auto px-4 py-3 relative min-h-[74vh]">
                <div className="grid grid-cols-2 lg:grid-cols-7">
                    <div className="col-span-5 ">
                        {/*  */}
                        <div className="w-full  bg-cover bg-center rounded-3xl overflow-hidden border shadow-xl bg-white">
                            <div className="bg-main-blue bg-opacity-40 col-span-2 rounded-l-3xl rounded-b-3xl p-4">
                                <div className="grid grid-cols-5 justify-between ">
                                    <div className="col-span-3 overflow-hidden ">
                                        <ControlCenterMac className="pb-3" />
                                        <p className="text-white text-md md:text-4xl font-semibold md:font-bold me-2 md:me-10 overflow-hidden line-clamp-3 pb-1 md:pb-10">
                                            {useTranslation(berita.name)}
                                        </p>
                                        <div className="">
                                            <p className="text-black text-xs md:text-sm ">
                                                {useTranslation(
                                                    DateFormater({
                                                        date: new Date()
                                                    })
                                                )}
                                            </p>
                                        </div>
                                    </div>
                                    <BouncingAnimation className="col-span-2 relative ">
                                        <div className="w-[100%] rounded-xl md:rounded-3xl overflow-hidden border-3 border-main-green p-2">
                                            <Image
                                                src={imageLink}
                                                alt={berita.slug}
                                                className=" aspect-video object-cover object-bottom rounded-xl md:rounded-3xl"
                                            />
                                        </div>
                                        <div className="absolute -left-8 top-0 md:-left-12 md:top-10 lg:-left-20 w-20 h-20 lg:w-40 lg:h-40 bg-main-blue shadow-lg shadow-black/25 backdrop-blur-md rounded-full opacity-65 z-0"></div>
                                        <div className="absolute left-2 md:left-10 w-10 h-10 lg:w-28 lg:h-28 bg-yellow-400 shadow-lg shadow-black/25 backdrop-blur-md opacity-80  rounded-tl-[70%] rounded-tr-full rounded-br-[30%] z-10"></div>
                                    </BouncingAnimation>
                                </div>
                            </div>
                        </div>
                        {/*  */}
                        <h1 className="text-3xl font-bold">{''}</h1>
                        <div className="mt-10 bg-white p-5 rounded-3xl shadow-xl">
                            <ControlCenterMac />
                            <div
                                className="prose py-10"
                                dangerouslySetInnerHTML={{
                                    __html: useTranslation(berita.desc ?? '')
                                }}
                            ></div>
                        </div>
                    </div>
                    <div className="col-span-2">
                        <SectionTrigerScroll
                            id="list-berita"
                            // macControlCenter
                            className="mt-10 p-5 "
                        >
                            <h2 className="font-bold text-3xl pb-4 border-b">
                                {useTranslation('Berita Lainnya')}
                            </h2>

                            <div className="grid grid-cols-1  gap-5">
                                {otherNews && otherNews.length > 0 ? (
                                    otherNews.map(item => {
                                        return (
                                            <NewsItem
                                                key={item.id}
                                                id={item.id}
                                                slug={item.slug}
                                                title={item.judul}
                                                date={new Date(item.date)} // ganti sesuai struktur data
                                                image={item.image}
                                                tag={item.tag}
                                                see={item.see}
                                            />
                                        )
                                    })
                                ) : (
                                    <p>Tidak ada berita tersedia</p>
                                )}
                            </div>
                        </SectionTrigerScroll>
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}
