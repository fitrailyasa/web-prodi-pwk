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

export default function NavBar() {
    const [isMenuOpen, setIsMenuOpen] = useState(false)
    const auth = false

    const Logo_img = '/assets/img/logo.png'

    const menuItems = [
        'Features',
        'Customers',
        'Integrations',
        'Login',
        'Sign Up'
    ]

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
            onMenuOpenChange={setIsMenuOpen}
            className=" flex justify-around "
        >
            {/* <NavbarContent> */}
            <Link href={'#'} className="font-bold text-inherit w-full">
                <NavbarBrand>
                    <img
                        src={Logo_img}
                        alt="Logo"
                        loading="lazy"
                        className="w-16 h-13"
                    />
                    <TypingAnimation
                        text="Perencanaan Wilayah dan Kota"
                        speed={0.01}
                    />
                </NavbarBrand>
            </Link>
            {/* </NavbarContent> */}

            <NavbarContent className="hidden lg:flex" justify="center">
                <NavbarItem>
                    <NavDropdown title="Profile" item={DropdwonProfleMenu} />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown title="Akademin" item={DropdwonAkademikMenu} />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown
                        title="Fasilitas"
                        item={DropdwonFasilitasMenu}
                    />
                </NavbarItem>
                <NavbarItem>
                    <Link href={'#'}>
                        <TypingAnimation
                            text="Berita dan Informasi"
                            speed={0.05}
                            ishover={true}
                            isBorderLeft={true}
                        />
                    </Link>
                </NavbarItem>
                <div className="border-l-2">
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
            <NavbarContent className="lg:hidden" justify="end">
                <NavbarMenuToggle
                    aria-label={isMenuOpen ? 'Close menu' : 'Open menu'}
                />
            </NavbarContent>
            <NavbarMenu>
                <Accordion variant="splitted">
                    <AccordionItem key="1" aria-label="Profile" title="Profile">
                        {DropdwonProfleMenu.map((item, index) => (
                            <NavbarMenuItem key={index}>
                                <Link
                                    className="w-full"
                                    href={item.href}
                                    sizes="lg"
                                >
                                    {item.title}
                                </Link>
                            </NavbarMenuItem>
                        ))}
                    </AccordionItem>
                    <AccordionItem
                        key="2"
                        aria-label="Accordion 2"
                        title="Accordion 2"
                    >
                        test
                    </AccordionItem>
                    <AccordionItem
                        key="3"
                        aria-label="Accordion 3"
                        title="Accordion 3"
                    >
                        test
                    </AccordionItem>
                </Accordion>
            </NavbarMenu>
        </Navbar>
    )
}
