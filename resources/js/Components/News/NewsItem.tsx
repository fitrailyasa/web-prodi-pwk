import { DateFormater } from '@/Helper/DateFormater'
import { Image } from '@nextui-org/react'
import EyeIcon from '../Icon/EyeInco'
import LoveIcon from '../Icon/LoveInco'
import ChatIcon from '../Icon/ChatInco'
import { NewsItemProps } from '@/types'

const NewsItem = (props: NewsItemProps) => {
    return (
        <div className="bg-white p-5 rounded-3xl shadow-xl">
            <div className="  flex justify-start gap-5">
                <Image
                    src={props.image}
                    alt="itera"
                    width={100}
                    height={100}
                    className="rounded-3xl"
                />
                <div className=" flex flex-col">
                    <h3 className="font-bold text-xl">{props.title}</h3>
                    <p>{DateFormater({ date: props.date })}</p>
                </div>
            </div>
            <div className="flex justify-end items-center gap-2">
                <div className="flex items-center gap-3">
                    <EyeIcon size={2} className="text-main-green text-xs" />
                    <span className="font-semibold">{props.see}</span>
                </div>
                <div className="flex items-center gap-3">
                    <LoveIcon size={2} className="text-main-green text-xs" />
                    <span className="font-semibold">{props.like}</span>
                </div>
                <div className="flex items-center gap-3">
                    <ChatIcon size={2} className="text-main-green text-xs" />
                    <span className="font-semibold">{props.comment}</span>
                </div>
            </div>
        </div>
    )
}

export default NewsItem
