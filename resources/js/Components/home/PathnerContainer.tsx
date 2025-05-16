import { TestImage } from '@/Constants'
import { PatnerProps, StorageProps } from '@/types'
import { Image } from '@heroui/react'
import { usePage } from '@inertiajs/react'

const PathnerContainer: React.FC<PatnerProps> = props => {
    const { storage } = usePage<{
        storage: StorageProps
    }>().props

    const imageLink = props.image ? storage.link + props.image : TestImage
    return (
        <>
            <a
                href={props.link}
                target="_blank"
                rel="noopener noreferrer"
                className="flex flex-col items-center justify-center w-24 md:w-52 gap-2 "
            >
                <Image
                    src={imageLink}
                    alt={props.title}
                    className="w-full h-full object-cover rounded-2xl shadow-lg aspect-square"
                />
                <h1 className="text-sm md:text-lg font-bold text-center text-main-blue-light">
                    {props.title}
                </h1>
            </a>
        </>
    )
}

export default PathnerContainer
