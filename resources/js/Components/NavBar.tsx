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
    NavbarMenuToggle,
    Link,
    Switch,
    LinkIcon
} from '@nextui-org/react'
import React, { useState } from 'react'
import AnggleDownIcon from './Icon/AnggleDownIcon'
import { TypingAnimation } from '@/Animation/TypingMotions'
import LightBulbIcon from './Icon/LightBulbIcon'
import IDIcon from './Icon/IDInco'
import ENIcon from './Icon/ENInco'
import { usePage } from '@inertiajs/react'
import { navLinkType } from '@/types'

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
        <Dropdown key={title} className="hidden sm:flex gap-2">
            <DropdownTrigger>
                <Button
                    disableRipple
                    className="p-0 flex gap-1 bg-transparent data-[hover=true]:bg-transparent text-md"
                    radius="sm"
                    variant="light"
                >
                    <TypingAnimation
                        className="p-0"
                        text={title}
                        ishover={true}
                    />
                    {icon ?? (
                        <AnggleDownIcon
                            size={12}
                            className="fill-gray-600 w-fit"
                        />
                    )}
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

function AccordionLink(prop: DropdownMenuItem) {
    return (
        <Link
            className="w-full block text-md text-black bg-slate-200 hover:bg-slate-400 my-2 py-2 px-3 rounded-lg"
            href={prop.href}
            isExternal={prop.newTab ?? false}
            // sizes="lg"
        >
            {prop.title}
        </Link>
    )
}
function MobileLink(prop: DropdownMenuItem) {
    return (
        <Link
            className="bg-white text-md text-black border hover:bg-gray-100 mt-0 mb-1 mx-2 p-4 rounded-xl"
            href={prop.href}
        >
            {prop.title}
        </Link>
    )
}

export default function NavBar() {
    const { nav_link } = usePage<{
        nav_link: navLinkType[]
    }>().props

    const [isMenuOpen, setIsMenuOpen] = useState(false)

    const Logo_img = '/assets/img/logo.png'

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
            href: '#',
            description: 'Kuriulum Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Kalender Akademik',
            href: route('akademik.kalender-akademik'),
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

    AcademicMenu.push(...otherAcademicMenu)

    // console.log(FasilityMenu)

    const DropdwonProfleMenu: DropdownMenuItem[] = [
        {
            title: 'Visi & Misi',
            href: '#',
            description:
                'Visi dan Misi Program Studi Perencanaan Wilayah dan Kota',
            icon: <LightBulbIcon className="fill-[#4005e1]" />
        },
        {
            title: 'Sejarah',
            href: '#',
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
            href: '#',
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

    return (
        <Navbar
            maxWidth="2xl"
            position="sticky"
            onMenuOpenChange={setIsMenuOpen}
            className="flex justify-around top-0 z-50"
        >
            <Link
                href={route('home')}
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
                    <Link className="text-black text-md" href={route('home')}>
                        <TypingAnimation
                            text="Beranda"
                            // speed={0.05}
                            ishover={true}
                            // isBorderLeft={true}
                        />
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown title="Profile" item={DropdwonProfleMenu} />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown title="Akademik" item={AcademicMenu} />
                </NavbarItem>
                <NavbarItem>
                    <NavDropdown title="Fasilitas" item={FasilityMenu} />
                </NavbarItem>
                <NavbarItem>
                    <Link className="text-black text-md" href={route('berita')}>
                        <TypingAnimation
                            text="Berita dan Informasi"
                            speed={0.05}
                            ishover={true}
                            // isBorderLeft={true}
                        />
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <Link className="text-black text-md" href={route('berita')}>
                        <TypingAnimation
                            text="Kontak"
                            speed={0.05}
                            ishover={true}
                            // isBorderLeft={true}
                        />
                    </Link>
                </NavbarItem>
                <div>
                    <Switch
                        defaultSelected
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
                    >
                        {/* Dark mode */}
                    </Switch>
                </div>
            </NavbarContent>
            <NavbarContent className="md:hidden" justify="end">
                <NavbarMenuToggle
                    aria-label={isMenuOpen ? 'Close menu' : 'Open menu'}
                />
            </NavbarContent>
            <NavbarMenu>
                <MobileLink href={route('home')} title={'Beranda'} />
                <Accordion variant="splitted">
                    <AccordionItem
                        className="hover:bg-gray-100 text-md"
                        key="1"
                        aria-label="Profile"
                        title="Profile"
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
                        className="hover:bg-gray-100 text-md"
                        key="2"
                        aria-label="Akademik"
                        title="Akademik"
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
                        className="hover:bg-gray-100 text-md"
                        key="3"
                        aria-label="Fasilitas"
                        title="Fasilitas"
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
                </Accordion>
                <MobileLink
                    href={route('berita')}
                    title={'Berita dan Informasi'}
                />
                <MobileLink href="#" title={'Kontak'} />`
            </NavbarMenu>
        </Navbar>
    )
}
