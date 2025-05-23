import { DateFormater } from '@/Helper/DateFormater'
import { Image } from '@heroui/react'
import EyeIcon from '../Icon/EyeInco'
import LoveIcon from '../Icon/LoveInco'
import ChatIcon from '../Icon/ChatInco'
import { NewsItemProps, StorageProps } from '@/types'
import ShareIcon from '../Icon/ShareInco'
import { router, usePage } from '@inertiajs/react'
import { useTranslation } from '@/Hooks/useTranslation'
import ShareBtn from '../Utils/ShareBtn'
import { TestImage } from '@/Constants'

const NewsItem = (props: NewsItemProps) => {
    const { storage } = usePage<{
        storage: StorageProps
    }>().props

    const imageLink = props.image ? storage.link + props.image : TestImage
    const handleClick = (slug: string) => {
        //navigate to news detail
        router.get(route('berita.show', { slug }))
    }
    return (
        <div className="bg-white p-2 md:p-5 rounded-xl md:rounded-3xl shadow-xl overflow-hidden">
            <div
                className="cursor-pointer"
                onClick={() => handleClick(props.slug)}
            >
                <div className="flex justify-start gap-5">
                    <Image
                        src={imageLink}
                        alt={props.title}
                        // width={100}
                        // height={100}
                        className="rounded-3xl aspect-square bg-white sm:w-[100px] md:w-[80px] max-w-[100px]"
                    />
                    <div className=" flex flex-col">
                        <h3 className="font-bold text-md md:text-lg text-main-blue-light">
                            {useTranslation(props.title)}
                        </h3>
                        <p className="text-sm  font-semibold text-gray-500">
                            {useTranslation(DateFormater({ date: props.date }))}
                        </p>
                    </div>
                </div>
            </div>
            <div className="flex justify-end items-center gap-2 md:gap-5">
                <div className="flex items-center gap-1">
                    <EyeIcon size={2} className="text-main-green text-xs" />
                    <span className="font-semibold">{props.see}</span>
                </div>
                <ShareBtn
                    // className="flex items-center gap-3"
                    title={useTranslation(props.title)}
                    url={route('berita.show', { slug: props.slug })}
                >
                    {' '}
                    <ShareIcon size={2} className="text-main-green text-xs" />
                </ShareBtn>
            </div>
        </div>
    )
}

export default NewsItem
