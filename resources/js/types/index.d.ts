import { eventTypes, MisiType } from './PropsType'

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
    prestasi_akademik?: string[]
    organisasi_kampus?: string[]

    // Pekerjaan & Karier
    posisi_pekerjaan?: string
    nama_perusahaan?: string
    bidang_industri?: string
    pengalaman_kerja?: string[]

    //contact
    linkedin?: string
    github?: string
    portofolio?: string
    instagram?: string
    email?: string
    nomor_telepon?: string

    // Magang & Penelitian
    dosen_pembimbing?: string
    bidang_penelitian?: string
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
