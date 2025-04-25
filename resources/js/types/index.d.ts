import { eventTypes, MisiType } from './PropsType'

export type DataPagienation<T> = {
    current_page: number
    data: T[]
    from: number | null
    last_page: number
    path: string
    to: number | null
    total: number
}

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
    slug?: string
    date: Date
    tag?: string
    description?: string
    image: string
    id: number
    see: number
    like?: number
    comment?: number
}

export type DosenCardType = {
    name: string
    position?: string
    image: string
    id: number
    isCoordinator?: boolean
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

// export type AlumniItemtypes = {
//     name: string
//     tahun_masuk: string
//     tahun_lulus: string
//     image: string
//     email?: string
//     nomor_telepon?: string
//     id?: number
//     tempat_magang?: string
//     tempat_kerja?: string
//     judul_penelitian?: string
// }

export type AlumniItemTypes = {
    id?: number
    name: string
    tahun_masuk: string
    tahun_lulus: string
    image: string

    // Pendidikan & Akademik
    judul_penelitian?: string
    ipk?: number

    // Pekerjaan & Karier
    posisi_pekerjaan?: string
    nama_perusahaan?: string

    //contact
    linkedin?: string
    instagram?: string
    email?: string
    nomor_telepon?: string
}

export type navLinkType = {
    id?: number
    title: string
    description: string
    href: string
    category: string
}

export type pageProps<t> = T

export type statustic = {
    total_tendik: number
    total_dosen: number
    total_mahasiswa: number
}

export type aboutPWK = {
    tantang: string
    visi: string
    misi: MisiType[]
}

export type HomeProps = {
    popularNews: NewsItemProps[]
    statistic: statustic
    aboutPWK: aboutPWK
    event: eventTypes[]
}

export type EmployePageProps = {
    koordinator: DosenCardType
    employee: DosenCardType[]
    staff?: DosenCardType[]
}

export type AlumniPageProps = {
    alumni: DataPagienation<AlumniItemTypes>
    title?: string
}
