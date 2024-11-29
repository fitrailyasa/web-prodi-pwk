import IconHome from '@/Components/Icon/IconHome'
import AppLayout from '../Layouts/AppLayout'
import { Button, Link } from '@nextui-org/react'
import { motion } from 'framer-motion'
import { useVisitor } from '@/Providers/VisitorProvider'
import { Slider } from '@/Components/Slider'

type WelcomeProps = {
    name: string
}

export default function Welcome({ name }: WelcomeProps) {
    const visitor = useVisitor()
    const image = '/assets/img/logo.png'

    const benner = [
        {
            img: '/assets/img/logo.png',
            alt: 'Banner 1'
        },
        {
            img: '/assets/img/logo.png',
            alt: 'Banner 1'
        },
        {
            img: '/assets/img/logo.png',
            alt: 'Banner 1'
        }
    ]

    const navigate = (name: string) => {
        window.location.href = route(name)
    }
    return (
        <AppLayout title={'welcome'}>
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center text"> Wlecome </p>
                <p> {name} test </p>
                <img src={image} alt="test" />
                <Button color="primary" onClick={() => navigate('about')}>
                    <IconHome size={24} /> Home
                </Button>
                <Link href={route('berita')}>
                    {visitor.visitorCount} {JSON.stringify(visitor.visitorData)}
                </Link>
            </div>
            <div
                style={{
                    display: 'flex',
                    justifyContent: 'center',
                    alignItems: 'center',
                    height: '100vh'
                }}
            >
                <motion.h1
                    initial={{ opacity: 0, x: -100 }} // Menentukan keadaan awal (transparansi 0 dan bergerak ke kiri)
                    animate={{ opacity: 1, x: 0 }} // Menentukan keadaan akhir (transparansi penuh dan berada di tengah)
                    transition={{ duration: 1 }} // Durasi animasi
                    className="text-black"
                >
                    Selamat Datang di Framer Motion!
                </motion.h1>
            </div>

            <div className="h-screen flex items-center justify-center bg-gray-50">
                <Slider>
                    <div className="w-full h-64 flex items-center justify-center bg-red-400 text-white text-2xl font-bold">
                        Slide 1
                    </div>
                    <div className="w-full h-64 flex items-center justify-center bg-blue-400 text-white text-2xl font-bold">
                        Slide 2
                    </div>
                    <div className="w-full h-64 flex items-center justify-center bg-green-400 text-white text-2xl font-bold">
                        Slide 3
                    </div>
                </Slider>
            </div>
        </AppLayout>
    )
}
