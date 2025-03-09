import { DateFormater } from '@/Helper/DateFormater'
import { Image } from '@heroui/react'
import EyeIcon from '../Icon/EyeInco'
import LoveIcon from '../Icon/LoveInco'
import ChatIcon from '../Icon/ChatInco'
import { NewsItemProps } from '@/types'
import ShareIcon from '../Icon/ShareInco'
import { router } from '@inertiajs/react'

const NewsItem = (props: NewsItemProps) => {
    const handleClick = (id: number) => {
        //navigate to news detail
        router.get(route('berita.show', { id }))
    }
    return (
        <div
            onClick={() => handleClick(props.id)}
            className="bg-white p-5 rounded-3xl shadow-xl"
        >
            <div className="  flex justify-start gap-5">
                <Image
                    src={props.image}
                    alt={props.title}
                    // width={100}
                    // height={100}
                    className="rounded-3xl aspect-square w-[100px] min-w-[100px] max-w-[100px]"
                />
                <div className=" flex flex-col">
                    <h3 className="font-bold text-xl">{props.title}</h3>
                    <p>{DateFormater({ date: props.date })}</p>
                </div>
            </div>
            <div className="flex justify-end items-center gap-5">
                <div className="flex items-center gap-1">
                    <EyeIcon size={2} className="text-main-green text-xs" />
                    <span className="font-semibold">{props.see}</span>
                </div>
                <button className="flex items-center gap-3">
                    <ShareIcon size={2} className="text-main-green text-xs" />
                    {/* <span className="font-semibold">{props.like}</span> */}
                </button>
            </div>
        </div>
    )
}

export default NewsItem
