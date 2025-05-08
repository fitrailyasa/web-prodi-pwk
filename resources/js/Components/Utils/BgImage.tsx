import { BgImageProps, StorageProps } from '@/types'
import { usePage } from '@inertiajs/react'

const BgImageComponent = ({
    src,
    alt,
    className,
    Possition = 'bg-center',
    isStorage = true,
    children
}: BgImageProps) => {
    const { storage } = usePage<{
        storage: StorageProps
    }>().props
    return (
        <div
            className={`bg-cover ${Possition} bg-no-repeat ${className}`}
            style={{
                backgroundImage: `url(${isStorage ? storage.link + src : src})`
            }}
        >
            {children}
        </div>
    )
}

export default BgImageComponent
