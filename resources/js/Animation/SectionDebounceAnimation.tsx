import React, { useEffect, useRef, useState } from 'react'
import { motion, useAnimation, useInView } from 'framer-motion'
import ControlCenterMac from '@/Components/ControlCenterMac'

interface BouncingAnimationProps {
    children: React.ReactNode
    id: string
    className?: string
    macControlCenter?: boolean
}

export const SectionTrigerScroll: React.FC<BouncingAnimationProps> = ({
    children,
    id,
    className,
    macControlCenter = false
}) => {
    const sectionRef = useRef<HTMLDivElement>(null)
    const isInView = useInView(sectionRef, { amount: 0.4 })

    const controls = useAnimation()
    const [isMobile, setIsMobile] = useState(false)

    // Cek apakah layar adalah mobile
    useEffect(() => {
        const handleResize = () => {
            setIsMobile(window.innerWidth < 768) // batas mobile: 768px
        }

        handleResize() // langsung jalankan saat mount
        window.addEventListener('resize', handleResize)

        return () => {
            window.removeEventListener('resize', handleResize)
        }
    }, [])

    useEffect(() => {
        if (isMobile) return

        if (isInView) {
            controls.start({
                scale: 1,
                opacity: 1,
                transition: { duration: 0.5, ease: 'easeOut' }
            })
        } else {
            controls.start({
                scale: 0.8,
                opacity: 0.6,
                transition: { duration: 0.5, ease: 'easeOut' }
            })
        }
    }, [isInView, controls, isMobile])

    return (
        <motion.div
            id={id}
            ref={sectionRef}
            animate={isMobile ? { scale: 1, opacity: 1 } : controls}
            initial={{ scale: 0.8, opacity: 0.6 }}
        >
            <section className={className}>
                {macControlCenter && <ControlCenterMac className="pb-3" />}
                {children}
            </section>
        </motion.div>
    )
}
