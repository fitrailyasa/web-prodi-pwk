import React, { useState } from 'react'
import AnggleDownIcon from './Icon/AnggleDownIcon'
import LightBulbIcon from './Icon/LightBulbIcon'
import IDIcon from './Icon/IDInco'
import ENIcon from './Icon/ENInco'
import { usePage } from '@inertiajs/react'
import { navLinkType } from '@/types'
import { useLanguage } from '@/Providers/LanguageProvider'
import { useTranslation } from '@/Hooks/useTranslation'
import {
    Accordion,
    AccordionItem,
    Button,
    Dropdown,
    DropdownItem,
    DropdownMenu,
    DropdownTrigger,
    Link,
    Navbar,
    NavbarBrand,
    NavbarContent,
    NavbarItem,
    NavbarMenu,
    NavbarMenuToggle,
    Switch
} from '@heroui/react'

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
        <Dropdown
            key={title}
            className="hidden sm:flex gap-2 text-main-blue-light"
        >
            <DropdownTrigger>
                <Button
                    disableRipple
                    className="p-0 flex text-main-blue-light gap-1 bg-transparent data-[hover=true]:bg-transparent text-md font-medium hover:text-[#4005e1] transition-colors duration-200"
                    radius="sm"
                    variant="light"
                >
                    {title}
                    {icon ?? (
                        <AnggleDownIcon
                            size={12}
                            className="fill-gray-600 w-fit group-hover:fill-[#4005e1] transition-colors duration-200"
                        />
                    )}
                </Button>
            </DropdownTrigger>

            <DropdownMenu
                aria-label={title}
                itemClasses={{
                    base: 'gap-4 p-2',
                    title: 'text-sm font-medium',
                    description: 'text-xs text-gray-500'
                }}
                className="min-w-[250px] shadow-lg rounded-lg"
            >
                {item.map((item, index) => (
                    <DropdownItem
                        href={item.href}
                        target={item.newTab ? '_blank' : '_self'}
                        key={index}
                        description={
                            item.description
                                ? useTranslation(item.description)
                                : null
                        }
                        startContent={item.icon ?? null}
                        className="hover:bg-[#4005e1]/10 rounded-lg transition-colors duration-200"
                    >
                        {useTranslation(item.title)}
                    </DropdownItem>
                ))}
            </DropdownMenu>
        </Dropdown>
    )
}

function AccordionLink(prop: DropdownMenuItem) {
    return (
        <Link
            className="w-full block text-md text-main-blue-light hover:bg-[#4005e1]/10 my-2 py-2 px-3 rounded-lg transition-colors duration-200"
            href={prop.href}
            isExternal={prop.newTab ?? false}
        >
            {useTranslation(prop.title)}
        </Link>
    )
}
function MobileLink(prop: DropdownMenuItem) {
    return (
        <Link
            className="bg-white text-md text-main-blue-light hover:bg-[#4005e1]/10 mt-0 mb-1 mx-2 p-4 rounded-xl transition-colors duration-200 shadow-md"
            href={prop.href}
        >
            {useTranslation(prop.title)}
        </Link>
    )
}

export default function NavBar() {
    const { nav_link } = usePage<{
        nav_link: navLinkType[]
    }>().props

    const [isMenuOpen, setIsMenuOpen] = useState(false)
    const { language, setLanguage } = useLanguage()
    const translate = useTranslation

    const Logo_img = '/assets/img/logo-full.png'

    const handleLanguageChange = (isSelected: boolean) => {
        const newLanguage = isSelected ? 'id' : 'en'
        setLanguage(newLanguage)
        localStorage.setItem('vite-language', newLanguage)
    }

    const FasilityMenu: DropdownMenuItem[] = nav_link
        .filter(item => item.category === 'fasilitas')
        .map(item => {
            return {
                title: item.title,
                href: item.href,
                description: item.description,
                icon: <LightBulbIcon className="fill-[#4005e1]" />
            }
        })

    const AcademicMenu: DropdownMenuItem[] = nav_link
        .filter(item => item.category === 'akademik')
        .map(item => {
            return {
                title: item.title,
                href: item.href,
                description: item.description,
                icon: <LightBulbIcon className="fill-[#4005e1]" />
            }
        })

    const otherAcademicMenu = [
        {
            title: 'Kurikulum',
            href: route('akademik.kurikulum'),
            description: 'Kuriulum Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Kalender Akademik',
            href: route('akademik.kalender-akademik'),
            description: 'Kalender Akademik Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        }
        // {
        //     title: 'MBKM',
        //     href: route('akademik.mbkm'),
        //     description:
        //         'Merdeka Belajar Kampus Merdeka Program Studi Perencanaan Wilayah dan Kota',
        //     icon: <LightBulbIcon className="fill-[#4005e1]" />
        // }
    ]

    AcademicMenu.push(...otherAcademicMenu)

    const DropdwonProfleMenu: DropdownMenuItem[] = [
        {
            title: 'Visi & Misi',
            href: route('profile.visi-misi'),
            description:
                'Visi dan Misi Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Sejarah',
            href: route('profile.sejarah'),
            description: 'Sejarah Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Dosen & Staf Akademik',
            href: route('profile.dosen-and-staf'),
            description:
                'Dosen dan Staf Akademik Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Kelompok Keahlian',
            href: route('profile.kelompok-keahlian'),
            description:
                'Kelompok Keahlian Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Alumni',
            href: route('profile.alumni'),
            description:
                'Alumni Program Studi Perencanaan Wilayah dan Kota Institut Teknologi Sumatera',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        }
    ]

    const DropdwonMahasiswaMenu: DropdownMenuItem[] = [
        {
            title: 'Form Layanan Mahasiswa',
            href: route('kemahasiswaan.form-layanan'),
            description:
                'Form Layanan Mahasiswa Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        }
    ]

    const MahasiswaMenu: DropdownMenuItem[] = nav_link
        .filter(item => item.category.toLowerCase() === 'kemahasiswaan')
        .map(item => {
            return {
                title: item.title,
                href: item.href,
                description: item.description,
                icon: <LightBulbIcon className="fill-[#4005e1]" />
            }
        })
    MahasiswaMenu.push(...DropdwonMahasiswaMenu)

    return (
        <Navbar
            maxWidth="2xl"
            position="sticky"
            onMenuOpenChange={setIsMenuOpen}
            className="flex justify-around top-0 z-50 bg-white/80 backdrop-blur-sm shadow-sm"
        >
            <NavbarBrand>
                <Link
                    href={route('home')}
                    className="font-bold text-inherit w-full hover:opacity-80 transition-opacity duration-200"
                >
                    <img
                        src={Logo_img}
                        alt="Logo"
                        loading="lazy"
                        className="w-60"
                    />
                </Link>
            </NavbarBrand>
            <NavbarContent className="hidden md:flex gap-6" justify="center">
                <NavbarItem>
                    <Link
                        className="text-main-blue-light text-md font-medium hover:text-[#4005e1] transition-colors duration-200"
                        href={route('home')}
                    >
                        {translate('Beranda')}
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown
                        title={translate('Profile')}
                        item={DropdwonProfleMenu}
                    />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown
                        title={translate('Akademik')}
                        item={AcademicMenu}
                    />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown
                        title={translate('Fasilitas')}
                        item={FasilityMenu}
                    />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown
                        title={translate('Kemahasiswaan')}
                        item={MahasiswaMenu}
                    />
                </NavbarItem>
                <NavbarItem>
                    <Link
                        className="text-main-blue-light text-md font-medium hover:text-[#4005e1] transition-colors duration-200"
                        href={route('berita')}
                    >
                        {translate('Berita')}
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <Link
                        className="text-main-blue-light text-md font-medium hover:text-[#4005e1] transition-colors duration-200"
                        href={route('contact')}
                    >
                        {translate('Kontak')}
                    </Link>
                </NavbarItem>
                <div className="ml-4">
                    <Switch
                        isSelected={language === 'id'}
                        onValueChange={handleLanguageChange}
                        color="secondary"
                        size="lg"
                        thumbIcon={({ isSelected, className }) =>
                            isSelected ? (
                                <IDIcon
                                    className={`${className} text-main-green p-1`}
                                />
                            ) : (
                                <ENIcon
                                    className={`${className} text-main-green p-1`}
                                />
                            )
                        }
                    />
                </div>
            </NavbarContent>
            <NavbarContent className="md:hidden" justify="end">
                <NavbarMenuToggle
                    aria-label={isMenuOpen ? 'Close menu' : 'Open menu'}
                    className="text-main-blue-light hover:text-[#4005e1] transition-colors duration-200"
                />
            </NavbarContent>
            <NavbarMenu className="bg-white/95 backdrop-blur-sm">
                <MobileLink href={route('home')} title={'Beranda'} />
                <Accordion variant="splitted" className="px-2">
                    <AccordionItem
                        className="bg-white text-md text-main-blue-light hover:bg-[#4005e1]/10 rounded-xl transition-colors duration-200 shadow-md"
                        key="1"
                        aria-label="Profile"
                        title={
                            <span className="text-main-blue-light font-normal">
                                {useTranslation('Profile')}
                            </span>
                        }
                    >
                        {DropdwonProfleMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                newTab={item.newTab ?? false}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                    <AccordionItem
                        className="bg-white text-md text-main-blue-light hover:bg-[#4005e1]/10 rounded-xl transition-colors duration-200 shadow-md"
                        key="2"
                        aria-label="Akademik"
                        title={
                            <span className="text-main-blue-light font-normal">
                                {useTranslation('Akademik')}
                            </span>
                        }
                    >
                        {AcademicMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                newTab={item.newTab ?? false}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                    <AccordionItem
                        className="bg-white text-md text-main-blue-light hover:bg-[#4005e1]/10 rounded-xl transition-colors duration-200 shadow-md"
                        key="3"
                        aria-label="Fasilitas"
                        title={
                            <span className="text-main-blue-light font-normal">
                                {useTranslation('Fasilitas')}
                            </span>
                        }
                    >
                        {FasilityMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                newTab={item.newTab ?? false}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                    <AccordionItem
                        className="bg-white text-md text-main-blue-light hover:bg-[#4005e1]/10 rounded-xl transition-colors duration-200 shadow-md"
                        key="4"
                        aria-label="kemahasiswaan"
                        title={
                            <span className="text-main-blue-light font-normal">
                                {useTranslation('Kemahasiswaan')}
                            </span>
                        }
                    >
                        {MahasiswaMenu.map((item, index) => (
                            <AccordionLink
                                key={index}
                                href={item.href}
                                newTab={item.newTab ?? false}
                                title={item.title}
                            />
                        ))}
                    </AccordionItem>
                </Accordion>
                <MobileLink href={route('berita')} title={'Berita'} />
                <MobileLink href={route('contact')} title={'Kontak'} />
                <div className="bg-white text-md flex justify-between text-main-blue-light mt-0 mb-1 mx-2 p-4 rounded-xl shadow-md">
                    {language === 'id' ? 'Bahasa Indonesia' : 'English'}
                    <Switch
                        isSelected={language === 'id'}
                        onValueChange={handleLanguageChange}
                        color="secondary"
                        size="lg"
                        thumbIcon={({ isSelected, className }) =>
                            isSelected ? (
                                <IDIcon
                                    className={`${className} text-main-green p-1`}
                                />
                            ) : (
                                <ENIcon
                                    className={`${className} text-main-green p-1`}
                                />
                            )
                        }
                    />
                </div>
            </NavbarMenu>
        </Navbar>
    )
}
