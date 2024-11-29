import IconHome from '@/Components/Icon/IconHome'
import AppLayout from '../Layouts/AppLayout'
import { Button, Link } from '@nextui-org/react'
import { motion } from 'framer-motion'
import { useVisitor } from '@/Providers/VisitorProvider'
import { Slider } from '@/Components/Slider'

type WelcomeProps = {
    name: string
}

const berita = [
    {
        title: 'Gelar Lmbka Karya Studio Setingkat Nasional',
        date: '2021-10-10',
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: '2021-10-10',
        image: './assets/img/test.png'
    }
]

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
            {/* <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center text"> Wlecome </p>
                <p> {name} test </p>
                <img src={image} alt="test" />
                <Button color="primary" onClick={() => navigate('about')}>
                    <IconHome size={24} /> Home
                </Button>
                <Link href={route('berita')}>
                    {visitor.visitorCount} {JSON.stringify(visitor.visitorData)}
                </Link>
            </div> */}

            <div className="aspect-video flex items-center justify-center bg-gray-50">
                <Slider autoSlider={false}>
                    {berita.map((item, index) => (
                        <div
                            className={`relative w-full h-full  bg-cover bg-center`}
                            style={{ backgroundImage: `url(${item.image})` }}
                        >
                            <div className="absolute w-full h-full flex items-center justify-center bg-gradient-to-r from-[#236899] to-transparent">
                                <h1 className="text-white text-4xl font-bold">
                                    {item.title}
                                </h1>
                            </div>
                            {/* <img src={item.image} alt="test" /> */}
                            {/* {item.title} */}
                        </div>
                    ))}
                    {/* <div className="w-full h-full flex items-center justify-center bg-red-400 text-white text-2xl font-bold">
                        Slide 1
                    </div>
                    <div className="w-full h-full flex items-center justify-center bg-blue-400 text-white text-2xl font-bold">
                        Slide 2
                    </div>
                    <div className="w-full h-full flex items-center justify-center bg-green-400 text-white text-2xl font-bold">
                        Slide 3
                    </div> */}
                </Slider>
            </div>
        </AppLayout>
    )
}
