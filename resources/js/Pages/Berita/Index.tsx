import LargeNewsItem from '@/Components/News/LargeNewsItem'
import AppLayout from '../../Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import NewsItem from '@/Components/News/NewsItem'
import { TestImage } from '@/Constants'
import {
    Button,
    DateRangePicker,
    Input,
    Select,
    SelectItem
} from '@heroui/react'
import { useTranslation } from '@/Hooks/useTranslation'
import { useEffect, useRef, useState } from 'react'
import { router, usePage } from '@inertiajs/react'
import { DataPagienation } from '@/types'
import PaginationComponent from '@/Components/Utils/Pagination'

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
        key: string
        label: string
    }>
    otherNews: DataPagienation<{
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

export default function BeritaPage({
    berita,
    tags,
    otherNews
}: BeritaPageProps) {
    const { search, tag } = usePage().props as {
        search?: string
        tag?: string
    }
    const [tagsSelected, setTagsSelected] = useState<string[]>([])
    const [querySearch, setQuerySearch] = useState<string>('')
    const debounceTimeout = useRef<NodeJS.Timeout | null>(null)

    const handleSelectionChange = (key: any) => {
        if (debounceTimeout.current) {
            clearTimeout(debounceTimeout.current)
        }
        setTagsSelected(key?.currentKey ? [key.currentKey] : [])

        debounceTimeout.current = setTimeout(() => {
            // console.log('handleSelectionChange', key?.currentKey)
            router.get(
                route('berita'),
                {
                    search: querySearch,
                    tags: key?.currentKey ? key.currentKey : ''
                },
                {
                    preserveState: true,
                    preserveScroll: true,
                    replace: true
                }
            )
        }, 500)
    }
    const handleQury = () => {
        router.get(
            route('berita'),
            {
                search: querySearch,
                tags: tagsSelected[0] ?? ''
            },
            {
                preserveState: true,
                preserveScroll: true,
                replace: true
            }
        )
    }

    return (
        <AppLayout title={'Berita'}>
            <div className="container mx-auto px-4 py-3 relative">
                {/* <SectionTrigerScroll id="list-berita" className="mt-10 p-5 "> */}
                <div id="list-berita" className="mt-2 md:mt-10 p-3 md:p-5 ">
                    <h2 className="font-bold text-3xl pb-4 border-b text-main-blue-light">
                        {useTranslation('Berita Terbaru')}
                    </h2>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 md:gap-5">
                        {berita && berita.length > 0 ? (
                            berita.map(item => {
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

                <div id="other-berita" className="mt-2 md:mt-10 p-3 md:p-5 ">
                    <div className="border-b">
                        <h2 className="font-bold text-lg md:text-3xl pb-4 text-main-blue-light">
                            {useTranslation('Berita Lainnya')}
                        </h2>
                        <div className="flex flex-wrap justify-between pb-5 mb-6 md:mb-0 gap-4 border-b">
                            <Select
                                className="max-w-xs"
                                defaultSelectedKeys={tagsSelected}
                                onSelectionChange={handleSelectionChange}
                                label={useTranslation('Katagori Berita')}
                                labelPlacement={'outside-left'}
                                placeholder={useTranslation(
                                    'Pilih Katagori Berita'
                                )}
                            >
                                {tags.map(item => (
                                    <SelectItem key={item.key}>
                                        {item.label}
                                    </SelectItem>
                                ))}
                            </Select>

                            <Input
                                className="max-w-xl justify-end"
                                placeholder={useTranslation(
                                    'Masukkan kata kunci'
                                )}
                                value={querySearch}
                                onChange={e => {
                                    setQuerySearch(e.target.value)
                                }}
                                endContent={
                                    <Button
                                        onPress={handleQury}
                                        className="bg-main-green font-semibold text-white inline-block"
                                    >
                                        {useTranslation('Cari')}
                                    </Button>
                                }
                            />
                        </div>

                        {otherNews.data && otherNews.data.length > 0 ? (
                            <>
                                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2 md:gap-5">
                                    {otherNews.data.map(item => {
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
                                    })}
                                </div>
                                <div className="mt-12">
                                    <PaginationComponent
                                        current_page={otherNews.current_page}
                                        page_url={otherNews.path}
                                        las_page={otherNews.last_page}
                                        total={otherNews.total}
                                        queryPage={['search', 'tags']}
                                    />
                                </div>
                            </>
                        ) : (
                            <p>Tidak ada berita tersedia</p>
                        )}
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}
