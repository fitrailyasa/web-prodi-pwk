import React, { useRef } from 'react'
import { motion, useScroll, useTransform, Variants } from 'framer-motion'

interface BouncingAnimationProps {
    children: React.ReactNode
    className?: string
}

export const SectionTrigerScroll: React.FC<BouncingAnimationProps> = ({
    children,
    className
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
            <section className={className}>{children}</section>
        </motion.div>
    )
}
