import { DateFormater } from '@/Helper/DateFormater'
import { Image } from '@heroui/react'
import EyeIcon from '../Icon/EyeInco'
import LoveIcon from '../Icon/LoveInco'
import ChatIcon from '../Icon/ChatInco'
import { NewsItemProps, StorageProps } from '@/types'
import ShareIcon from '../Icon/ShareInco'
import { router, usePage } from '@inertiajs/react'
import { TestImage } from '@/Constants'
import { useTranslation } from '@/Hooks/useTranslation'
import ShareBtn from '../Utils/ShareBtn'

const LargeNewsItem = (props: NewsItemProps) => {
    const { storage } = usePage<{
        storage: StorageProps
    }>().props
    const handleClick = (slug: string) => {
        router.get(route('berita.show', { slug }))
    }
    const imageLink = props.image ? storage.link + props.image : TestImage
    return (
        <>
            <div className="bg-white p-3 md:p-5 rounded-xl flex flex-col justify-between md:rounded-3xl shadow-xl">
                <div
                    onClick={() => handleClick(props.slug)}
                    className="cursor-pointer overflow-hidden"
                >
                    <p className="rounded-lg bg-main-blue px-2 text-white mb-3  inline-block">
                        {useTranslation(props.tag ?? '')}
                    </p>
                    <div className="flex justify-start gap-5">
                        <Image
                            src={imageLink}
                            alt={props.title}
                            className="rounded-2xl aspect-square lg:aspect-video w-[100px] md:w-[120px] lg:w-[200px] md:min-w-[120px] lg:min-w-[200px] max-w-[400px]"
                        />
                        <div className=" flex flex-col">
                            <h3 className="font-bold text-base md:text-lg lg:text-xl text-main-blue-light">
                                {useTranslation(props.title)}
                            </h3>
                            <p className="text-sm lg:text-base font-semibold text-gray-500">
                                {useTranslation(
                                    DateFormater({ date: props.date })
                                )}
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
                        <ShareIcon
                            size={2}
                            className="text-main-green text-xs"
                        />
                    </ShareBtn>
                </div>
            </div>
        </>
    )
}

export default LargeNewsItem
