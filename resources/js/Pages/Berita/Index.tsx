import LargeNewsItem from '@/Components/News/LargeNewsItem'
import AppLayout from '../../Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import NewsItem from '@/Components/News/NewsItem'
import { TestImage } from '@/Constants'
import { Button, DateRangePicker } from '@heroui/react'
import { useTranslation } from '@/Hooks/useTranslation'

type BeritaPageProps = {
    berita: Array<{
        id: number
        judul: string
        image: string
        slug: string
        tag: string
        description: string
        date: string
        see: number
    }>
    tags: Array<{
        name: string
        slug: string
        berita: Array<{
            id: number
            judul: string
            image: string
            slug: string
            tag: string
            description: string
            date: string
            see: number
        }>
    }>
}

export default function BeritaPage({ berita, tags }: BeritaPageProps) {
    return (
        <AppLayout title={'Berita'}>
            <div className="container mx-auto px-4 py-3 relative">
                {/* <SectionTrigerScroll id="list-berita" className="mt-10 p-5 "> */}
                <div id="list-berita" className="mt-2 md:mt-10 p-3 md:p-5 ">
                    <h2 className="font-bold text-3xl pb-4 border-b">
                        {useTranslation('Berita Terbaru')}
                    </h2>
                    {/* <div className=" mb-3 py-2 flex justify-end">
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
                    </div> */}
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 md:gap-5">
                        {berita && berita.length > 0 ? (
                            berita.map(item => {
                                console.log(item)
                                return (
                                    <LargeNewsItem
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
                </div>

                {tags.length > 0 ? (
                    <div className="mt-10 p-5">
                        <h2 className="font-bold text-3xl pb-4 border-b">
                            {useTranslation('Berita Lainnya')}
                        </h2>

                        {tags.map(tag => (
                            <SectionTrigerScroll
                                id="list-berita"
                                className="mt-10 p-5 "
                            >
                                <h2 className="font-bold text-3xl pb-4 border-b">
                                    {useTranslation(tag.name)}
                                </h2>
                                {/* <div className=" mb-3 py-2 flex justify-end">
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
                                </div> */}
                                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-5">
                                    {tag.berita && tag.berita.length > 0 ? (
                                        tag.berita.map((item, index) => {
                                            console.log(
                                                'map other berita',
                                                item
                                            )
                                            if (index === 10) {
                                                return <></>
                                            }

                                            return (
                                                <LargeNewsItem
                                                    key={item.id}
                                                    id={item.id}
                                                    slug={item.slug}
                                                    title={item.judul}
                                                    date={
                                                        new Date(
                                                            item.date ??
                                                                new Date()
                                                        )
                                                    } // ganti sesuai struktur data
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
                        ))}
                    </div>
                ) : (
                    <div className="mt-10 p-5">
                        <h2 className="font-bold text-3xl pb-4 border-b">
                            {useTranslation('Berita Lainnya')}
                        </h2>
                        <p>Tidak ada berita tersedia</p>
                    </div>
                )}
            </div>
        </AppLayout>
    )
}
