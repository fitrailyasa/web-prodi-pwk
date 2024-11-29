import IconHome from '@/Components/Icon/IconHome'
import AppLayout from '../Layouts/AppLayout'
import { Button, Link } from '@nextui-org/react'
import { motion } from 'framer-motion'
import { useVisitor } from '@/Providers/VisitorProvider'
import { Slider } from '@/Components/Slider'
import React, { ReactNode, useState } from 'react'
import { DateFormater } from '@/Helper/DateFormater'
import CountAnimation from '@/Animation/CountAnimation'

type WelcomeProps = {
    name: string
}

const berita = [
    {
        title: 'Gelar Lmbka Karya Studio Setingkat Nasional',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    }
]

export default function Welcome({ name }: WelcomeProps) {
    const [sliderIndicators, setSliderIndicators] = useState<ReactNode>(null)

    const handelReciveComponent = (component: ReactNode) => {
        setSliderIndicators(component)
    }
    const visitor = useVisitor()
    const image = '/assets/img/logo.png'

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

            <section className="aspect-[11/4] flex items-center justify-center bg-gray-50">
                <Slider autoSlider={true} sendComponent={handelReciveComponent}>
                    {berita.map((item, index) => (
                        <div
                            key={index}
                            className={`relative w-full h-full bg-cover bg-center`}
                            style={{ backgroundImage: `url(${item.image})` }}
                        >
                            <div className="h-full bg-gradient-to-r from-[#236899] from-10% to-transparent to-110%">
                                <div className="h-full ms-28 me-96 px-10 py-32 flex flex-col justify-between  border">
                                    <h1 className="text-white text-6xl pb-10 font-bold">
                                        {item.title}
                                    </h1>
                                    <div className="">
                                        <p className="text-white text-sm">
                                            {DateFormater({ date: item.date })}
                                        </p>
                                        {sliderIndicators}
                                        <Button
                                            color="success"
                                            className=" font-semibold text-white inline-block"
                                        >
                                            Baca Selengkapnya
                                        </Button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </Slider>
            </section>
            <section id="statistik">
                <CountAnimation
                    from={0}
                    to={100}
                    duration={3}
                    className="font-bold text-4xl text-indigo-500"
                />
            </section>
        </AppLayout>
    )
}
