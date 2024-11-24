import { Link } from '@inertiajs/react'
import {
    Accordion,
    AccordionItem,
    Button,
    Dropdown,
    DropdownItem,
    DropdownMenu,
    DropdownTrigger,
    Navbar,
    NavbarBrand,
    NavbarContent,
    NavbarItem,
    NavbarMenu,
    NavbarMenuItem,
    NavbarMenuToggle
} from '@nextui-org/react'
import React, { useState } from 'react'
import AnggleDownIcon from './Icon/AnggleDownIcon'
import { TypingAnimation } from '@/Animation/TypingMotions'
import LightBulbIcon from './Icon/LightBulbIcon'

type DropdownMenuItem = {
    title: string
    href: string
    newTab?: boolean
    description?: string
    icon?: React.ReactNode
}

type propsDropdown = {
    title: string
    icon?: React.ReactNode
    item: DropdownMenuItem[]
}
function NavDropdown({ title, icon, item }: propsDropdown) {
    return (
        <Dropdown key={title} className="hidden sm:flex gap-4">
            <DropdownTrigger>
                <Button
                    disableRipple
                    className="p-0 bg-transparent data-[hover=true]:bg-transparent"
                    radius="sm"
                    variant="light"
                >
                    <TypingAnimation
                        text={title}
                        ishover={true}
                        isBorderLeft={true}
                    />
                    {icon ?? <AnggleDownIcon />}
                </Button>
            </DropdownTrigger>

            <DropdownMenu
                aria-label={title}
                itemClasses={{
                    base: 'gap-4'
                }}
            >
                {item.map((item, index) => (
                    <DropdownItem
                        href={item.href}
                        target={item.newTab ? '_blank' : '_self'}
                        key={index}
                        description={item.description ?? null}
                        startContent={item.icon ?? null}
                    >
                        {item.title}
                    </DropdownItem>
                ))}
            </DropdownMenu>
        </Dropdown>
    )
}

function AccordionLink(prop: {
    href: string
    title: string
    description?: string
    icon?: React.ReactNode
}) {
    return (
        <Link
            className="w-full block bg-slate-200 hover:bg-slate-400 my-2 py-2 px-3 rounded-lg"
            href={prop.href}
            sizes="lg"
        >
            {prop.title}
        </Link>
    )
}
function MobileLink(prop: {
    href: string
    title: string
    description?: string
    icon?: React.ReactNode
}) {
    return (
        <Link
            className="bg-white border hover:bg-gray-100 mt-0 mb-1 mx-2 p-4 rounded-xl"
            href={prop.href}
        >
            {prop.title}
        </Link>
    )
}

export default function NavBar() {
    const [isMenuOpen, setIsMenuOpen] = useState(false)
    const auth = false

    const Logo_img = '/assets/img/logo.png'

    const DropdwonProfleMenu = [
        {
            title: 'Visi & Misi',
            href: '#',
            description:
                'Visi dan Misi Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Sejaran',
            href: '#',
            description: 'Sejarah Program Studi Perencanaan Wilayah dan Kota',
            icon: null
        },
        {
            title: 'Dosen & Staf Akademik',
            href: '#',
            description:
                'Dosen dan Staf Akademik Program Studi Perencanaan Wilayah dan Kota',
            icon: null
        },
        {
            title: 'Kontak',
            href: '#',
            description: 'Kontak Program Studi Perencanaan Wilayah dan Kota',
            icon: null
        }
    ]

    const DropdwonAkademikMenu = [
        {
            title: 'Siakad',
            href: '#',
            newTab: true,
            description:
                'Sistem Informasi Akademik Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'E-Learning',
            href: '#',
            newTab: true,
            description: 'E-Learning Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'KKN',
            href: '#',
            newTab: true,
            description: 'Kuliah Kerja Nyata Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'jurnal',
            href: '#',
            newTab: true,
            description: 'Jurnal Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Kuriulum',
            href: '#',
            description: 'Kuriulum Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Kalender Akademin',
            href: '#',
            description: 'Kalender Akademik Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'MBKM',
            href: '#',
            description:
                'Mata Kuliah Berbasis Kompetensi Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        }
    ]

    const DropdwonFasilitasMenu = [
        {
            title: 'Website ITERA',
            href: 'https://itera.ac.id',
            newTab: true,
            description: 'Website Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Perpustakaan ITERA',
            href: 'https://itera.ac.id',
            newTab: true,
            description: 'Perpustakaan Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Laboratorium',
            href: 'https://itera.ac.id',
            newTab: true,
            description: 'Laboratorium Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Kemahaswaan',
            href: 'https://itera.ac.id',
            newTab: true,
            description: 'Kemahasiswaan Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'HelpDesk',
            href: 'https://itera.ac.id',
            newTab: true,
            description: 'HelpDesk Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'INCITE',
            href: 'https://itera.ac.id',
            newTab: true,
            description: 'UPA Bahasa Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        }
    ]

    return (
        <Navbar
            position="sticky"
            onMenuOpenChange={setIsMenuOpen}
            className="flex justify-around   top-0 z-50"
        >
            <Link
                href={route('beranda')}
                className="font-bold text-inherit w-full"
            >
                <NavbarBrand>
                    <img
                        src={Logo_img}
                        alt="Logo"
                        loading="lazy"
                        className="w-16 h-13"
                    />
                    <TypingAnimation
                        className="hidden min-[380px]:block"
                        text="Perencanaan Wilayah dan Kota"
                        speed={0.01}
                    />
                </NavbarBrand>
            </Link>
            <NavbarContent className="hidden md:flex" justify="center">
                <NavbarItem>
                    <Link href={route('beranda')}>
                        <TypingAnimation
                            text="Beranda"
                            // speed={0.05}
                            ishover={true}
                            isBorderLeft={true}
                        />
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown title="Profile" item={DropdwonProfleMenu} />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown title="Akademik" item={DropdwonAkademikMenu} />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown
                        title="Fasilitas"
                        item={DropdwonFasilitasMenu}
                    />
                </NavbarItem>
                <NavbarItem>
                    <Link href={route('berita')}>
                        <TypingAnimation
                            text="Berita dan Informasi"
                            speed={0.05}
                            ishover={true}
                            isBorderLeft={true}
                        />
                    </Link>
                </NavbarItem>
                <div>
                    <Link href={'#'}>
                        <TypingAnimation
                            text="Kontak"
                            speed={0.05}
                            ishover={true}
                            isBorderLeft={true}
                        />
                    </Link>
                </div>
            </NavbarContent>
            <NavbarContent className="md:hidden" justify="end">
                <NavbarMenuToggle
                    aria-label={isMenuOpen ? 'Close menu' : 'Open menu'}
                />
            </NavbarContent>
            <NavbarMenu>
                <MobileLink href={route('beranda')} title={'Beranda'} />
                <Accordion variant="splitted">
                    <AccordionItem
                        className="hover:bg-gray-100"
                        key="1"
                        aria-label="Profile"
                        title="Profile"
                    >
                        {DropdwonProfleMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                    <AccordionItem
                        className="hover:bg-gray-100"
                        key="2"
                        aria-label="Akademik"
                        title="Akademik"
                    >
                        {DropdwonAkademikMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                    <AccordionItem
                        className="hover:bg-gray-100"
                        key="3"
                        aria-label="Fasilitas"
                        title="Fasilitas"
                    >
                        {DropdwonAkademikMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                </Accordion>
                <MobileLink
                    href={route('berita')}
                    title={'Berita dan Informasi'}
                />
            </NavbarMenu>
        </Navbar>
    )
}
