import React, { useRef } from 'react'
import { motion, useScroll, useTransform, Variants } from 'framer-motion'
import ControlCenterMac from '@/Components/ControlCenterMac'

interface BouncingAnimationProps {
    children: React.ReactNode
    className?: string
    macControlCenter?: boolean
}

export const SectionTrigerScroll: React.FC<BouncingAnimationProps> = ({
    children,
    className,
    macControlCenter = false
}) => {
    const ref = useRef<HTMLDivElement>(null)
    const { scrollYProgress } = useScroll({
        target: ref,
        offset: ['0 1', '1.33 1']
    })

    const scaleProgress = useTransform(scrollYProgress, [0, 1], [0.8, 1])
    const opacityProgress = useTransform(scrollYProgress, [0, 1], [0.6, 1])
    return (
        <motion.div
            ref={ref}
            style={{ scale: scaleProgress, opacity: opacityProgress }}
        >
            <section className={className}>
                {macControlCenter && <ControlCenterMac className="pb-3" />}
                {children}
            </section>
        </motion.div>
    )
}
