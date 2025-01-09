export type AuthData = {
    user: AuthenticatedUserData
}
export type AuthenticatedUserData = {
    id: number
    email: string
    name: string
    gravatar: string
    email_verified_at: string | null
}
export type FlashMessageData = {
    type: string
    message: string
}
export type PagePropsData = {
    auth: AuthData
    flashMessage: FlashMessageData
}

export type NewsItemProps = {
    title: string
    date: Date
    description?: string
    image: string
    id: number
    see: number
    like: number
    comment: number
}

export type DosenCardType = {
    name: string
    position?: string
    image: string
    id: number
}

export type BgImageProps = {
    src: string
    Possition?:
        | 'bg-bottom'
        | 'bg-center'
        | 'bg-left'
        | 'bg-left-bottom'
        | 'bg-left-top'
        | 'bg-right'
        | 'bg-right-bottom'
        | 'bg-right-top'
        | 'bg-top'
    className?: string
    alt: string
    children?: React.ReactNode
}
