import { Link } from '@inertiajs/react'
import AppLayout from '../../Layouts/AppLayout'

type BeritaPageProps = {
    berita: Array<{
        id: number
        judul: string
        isi: string
    }>
}

export default function BeritaPage({ berita }: BeritaPageProps) {
    return (
        <AppLayout title={'Berita'}>
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center tex"> Berita </p>
                {berita.map(item => {
                    return (
                        <div className="p-5" key={item.id}>
                            <h1>{item.judul}</h1>
                            <p>{item.isi}</p>
                            <Link href={route('berita.show', item.id)}>
                                Read More
                            </Link>
                        </div>
                    )
                })}
            </div>
        </AppLayout>
    )
}
