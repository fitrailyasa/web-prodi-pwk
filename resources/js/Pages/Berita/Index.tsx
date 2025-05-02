import LargeNewsItem from '@/Components/News/LargeNewsItem'
import AppLayout from '../../Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import NewsItem from '@/Components/News/NewsItem'
import { TestImage } from '@/Constants'
import { Button, DateRangePicker } from '@heroui/react'

type BeritaPageProps = {
    berita: Array<{
        id: number
        judul: string
        image: string
        slug: string
        tag: string
        description: string
        date: string
    }>
}

export default function BeritaPage({ berita }: BeritaPageProps) {
    return (
        <AppLayout title={'Berita'}>
            <div className="container mx-auto px-4 py-3 relative">
                <SectionTrigerScroll id="list-berita" className="mt-10 p-5 ">
                    <h2 className="font-bold text-3xl pb-4 border-b">
                        Berita Terbaru
                    </h2>
                    <div className=" mb-3 py-2 flex justify-end">
                        <div className="flex justify-end items-center gap-5 w-1/2">
                            <DateRangePicker
                                key={'outside-left'}
                                className="w-1/2"
                                visibleMonths={2}
                                labelPlacement={'outside-left'}
                            />
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                filter
                            </Button>
                        </div>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-5">
                        {berita.map((item, index) => (
                            <LargeNewsItem
                                id={item.id}
                                key={index}
                                title={item.judul}
                                date={new Date()}
                                image={TestImage}
                                like={10}
                                comment={10}
                                see={10}
                            />
                            // <NewsItem
                            //     id={item.id}
                            //     key={index}
                            //     title={item.judul}
                            //     date={new Date()}
                            //     image={TestImage}
                            //     like={10}
                            //     comment={10}
                            //     see={10}
                            // />
                        ))}
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll id="list-berita" className="mt-10 p-5 ">
                    <h2 className="font-bold text-3xl pb-4 border-b">
                        Akademik
                    </h2>
                    <div className=" mb-3 py-2 flex justify-end">
                        <div className="flex justify-end items-center gap-5 w-1/2">
                            <DateRangePicker
                                key={'outside-left'}
                                className="w-1/2"
                                visibleMonths={2}
                                labelPlacement={'outside-left'}
                            />
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                filter
                            </Button>
                        </div>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        {berita.map((item, index) => (
                            <NewsItem
                                id={item.id}
                                key={index}
                                title={item.judul}
                                date={new Date()}
                                image={TestImage}
                                like={10}
                                comment={10}
                                see={10}
                            />
                        ))}
                    </div>
                </SectionTrigerScroll>

                <SectionTrigerScroll
                    id="list-berita"
                    // macControlCenter
                    className="mt-10 p-5 "
                >
                    <h2 className="font-bold text-3xl pb-4 border-b">
                        Prestasi
                    </h2>
                    <div className=" mb-3 py-2 flex justify-end">
                        <div className="flex justify-end items-center gap-5 w-1/2">
                            <DateRangePicker
                                key={'outside-left'}
                                className="w-1/2"
                                visibleMonths={2}
                                labelPlacement={'outside-left'}
                            />
                            <Button className="bg-main-green font-semibold text-white inline-block">
                                filter
                            </Button>
                        </div>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                        {berita.map((item, index) => (
                            <NewsItem
                                id={item.id}
                                key={index}
                                title={item.judul}
                                date={new Date()}
                                image={TestImage}
                                like={10}
                                comment={10}
                                see={10}
                            />
                        ))}
                    </div>
                </SectionTrigerScroll>
            </div>
        </AppLayout>
    )
}
