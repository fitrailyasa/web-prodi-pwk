import { BgImageProps } from '@/types'

const BgImageComponent = ({
    src,
    alt,
    className,
    Possition = 'bg-center',
    children
}: BgImageProps) => {
    return (
        <div
            className={`bg-cover ${Possition} bg-no-repeat ${className}`}
            style={{
                backgroundImage: `url(${src})`
            }}
        >
            {children}
        </div>
    )
}

export default BgImageComponent
